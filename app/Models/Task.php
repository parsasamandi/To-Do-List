<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',       // corresponds to the 'name' column in migration
        'tag',        // corresponds to the 'tag' column
        'priority',   // corresponds to the 'priority' column
        'status',     // corresponds to the 'status' column
        'due_date',   // corresponds to the 'due_date' column
        'sub_tag',   // corresponds to the 'sub_tag' column
    ];
}
