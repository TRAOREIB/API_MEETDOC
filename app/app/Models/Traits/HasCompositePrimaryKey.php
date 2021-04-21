<?php

namespace App\Models\Traits;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Arr;
use App\Models\Eloquent\CompositeKeyQueryBuilder;
use App\Models\Exceptions\MissingPrimaryKeyValueException;
use App\Models\Exceptions\WrongKeyException;
use App\Models\Scopes\CompositeKeyScope;

trait HasCompositePrimaryKey
{
    use NormalizedKeysParser, PrimaryKeyInformation, CompositeRelationships;

    /**
     * Destroy the models for the given IDs.
     *
     * @param array|int $ids
     *
     * @return int
     */
    public static function destroy($ids)
    {
        // We'll initialize a count here so we will return the total number of deletes
        // for the operation. The developers can then check this number as a boolean
        // type value or get this total count of records deleted for logging, etc.
        $count = 0;

        $ids = is_array($ids) ? $ids : func_get_args();

        foreach ((new static())->applyIds($ids)->get() as $model) {
            if ($model->delete()) {
                $count++;
            }
        }

        return $count;
    }

    /**
     * Convert the object into something JSON serializable.
     *
     * @return array
     */
    public function jsonSerialize()
    {
        $attributes = $this->toArray();
        foreach ($attributes as $key => $value) {
            if (in_array($key, $this->getBinaryColumns())) {
                $attributes[$key] = strtoupper(bin2hex($value));
            }
        }

        // append virtual row id
        if (count($this->getRawKeyName()) > 1) {
            $attributes[$this->getNormalizedKeyName()] = $this->getNormalizedKey();
        }

        return $attributes;
    }

    /**
     * Get the primary key for the model.
     *
     * @return array
     */
    public function getRawKeyName()
    {
        return $this->hasCompositeIndex() ? $this->primaryKey : [$this->primaryKey];
    }

    /**
     * Get the value of the model's primary key.
     *
     * @return mixed
     */
    public function getRawKey()
    {
        $attributes = [];

        foreach ($this->getRawKeyName() as $key) {
            $attributes[$key] = $this->getAttribute($key);
        }

        return $attributes;
    }

    /**
     * Get the value indicating whether the IDs are incrementing.
     *
     * @return bool
     */
    public function getIncrementing()
    {
        return false;
    }

    /**
     * Get the primary key for the model.
     *
     * @return string
     */
    public function getKeyName()
    {
        return $this->getNormalizedKeyName();
    }

    /**
     * Get virtual string key, required for proper collection support.
     *
     * @return mixed
     */
    public function getKey()
    {
        return $this->getNormalizedKey();
    }

    /**
     * @param \Illuminate\Database\Query\Builder $query
     * @param array|string                       $ids
     * @param bool                               $inverse
     *
     * @throws MissingPrimaryKeyValueException
     * @throws WrongKeyException
     */
    public function scopeApplyIds($query, $ids, $inverse = false)
    {
        $keys = ($instance = new static())->getRawKeyName();

        if (!is_array($ids) || Arr::isAssoc($ids)) {
            $ids = [$ids];
        }

        if ($this->hasCompositeIndex()) {
            (new CompositeKeyScope($keys, $ids, $inverse, $this->getBinaryColumns()))->apply($query);
        } else {
            if ($inverse) {
                $query->whereNotIn($this->qualifyColumn($keys[0]), $ids);
            } else {
                $query->whereIn($this->qualifyColumn($keys[0]), $ids);
            }
        }
    }

    /**
     * Get a new query to restore one or more models by their queueable IDs.
     *
     * @param array|int $ids
     *
     * @throws MissingPrimaryKeyValueException
     * @throws WrongKeyException
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function newQueryForRestoration($ids)
    {
        if (!is_array($ids)) {
            $ids = [$ids];
        }

        return $this->newQueryWithoutScopes()->applyIds(
            array_map(
                function ($normalizedKey) {
                    return $this->parseNormalizedKey($normalizedKey);
                },
                $ids
            )
        );
    }

    /**
     * @param \Illuminate\Database\Query\Builder $query
     *
     * @return \Illuminate\Database\Eloquent\Builder|static
     */
    public function newEloquentBuilder($query)
    {
        return new CompositeKeyQueryBuilder($query);
    }

    public function getBinaryColumns()
    {
        return $this->binaryColumns ?? [];
    }

    /**
     * Get the primary key value for a save query.
     *
     * @return mixed
     */
    protected function getKeyForSaveQuery()
    {
        $originalKeys = array_intersect_key($this->original, array_flip($this->getRawKeyName()));

        return array_merge($this->getRawKey(), $originalKeys);
    }

    /**
     * Set the keys for a save update query.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     *
     * @throws MissingPrimaryKeyValueException
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    protected function setKeysForSaveQuery(Builder $query)
    {
        foreach ($this->getRawKeyName() as $key) {
            if (isset($this->{$key})) {
                $query->where($key, '=', $this->{$key});
            } else {
                throw new MissingPrimaryKeyValueException($key, 'Missing value for key '.$key);
            }
        }

        return $query;
    }

    /**
     * Run the increment or decrement method on the model.
     *
     * @param string    $column
     * @param float|int $amount
     * @param array     $extra
     * @param string    $method
     *
     * @return int
     */
    protected function incrementOrDecrement($column, $amount, $extra, $method)
    {
        $query = $this->newQuery();

        if (!$this->exists) {
            return $query->{$method}($column, $amount, $extra);
        }

        $this->incrementOrDecrementAttributeValue($column, $amount, $extra, $method);

        foreach ($this->getRawKeyName() as $key) {
            $query->where($key, $this->getAttribute($key));
        }

        return $query->{$method}($column, $amount, $extra);
    }

    /**
     * Retrieve the model for a bound value.
     *
     * @param mixed $value
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function resolveRouteBinding($value)
    {
        if ($this->hasCompositeIndex() && $this->getRouteKeyName() == $this->getKeyName()) {
            return $this->whereKey($value)->first();
        } else {
            return $this->where($this->getRouteKeyName(), $value)->first();
        }
    }
}
