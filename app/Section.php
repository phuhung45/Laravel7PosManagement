<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Section extends Model
{
    // Em quên chưa thêm cái fillable cho trường status, bảo sao nó ko lưu đc :D vâng
    protected $fillable = ['section_name', 'status'];

    /**
     * Get all of the comment for the Category
     *
     *  @return\Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function categories(): HasMany{
        return $this->HasMany(Category::class);
    }
}
