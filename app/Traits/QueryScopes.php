<?php

namespace App\Traits;

trait QueryScopes
{
    public function scopeKeyword($query, $keyword) {
        if(!empty($keyword)) {
            $query->where('name', 'LIKE', '%'.$keyword.'%');
        }
        return $query;
    }

    public function scopePublish($query, $publish) {
        if(!empty($publish)) {
            $query->where('publish', '=', $publish);
        }
        return $query;
    }

    public function scopeRelationCount($query, $relation) {
        if(!empty($relation)) {
            foreach($relation as $item) {
                $query->withCount($item);
            }
        }
        return $query;
    }

    public function scopeCustomJoin($query, $join) {
        if(!empty($join)) {
            $query->join(...$join);
        }
    }
}
