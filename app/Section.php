<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    // Em quên chưa thêm cái fillable cho trường status, bảo sao nó ko lưu đc :D vâng
    protected $fillable = ['section_name', 'section_status', 'status'];
}
