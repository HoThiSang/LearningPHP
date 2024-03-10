<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Groups extends Model
{
    use HasFactory;

    protected $table = 'groupss';

    public function getAll()
    {
        $groups = DB::table($this->table)
        ->orderBy('group_name', 'ASC')
        ->get();

        return $groups;
    }
}
