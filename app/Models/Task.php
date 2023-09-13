<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;
    /*
    For securoty reasons this is called mass assignment
    */
    // using fillabee is more secured than using guareded
    // becaue any new feild will be considered as not guarded
    protected $fillable = ['title', 'description','long_description'];
    // the opposite of fillable
    //protected $guarded = ['secret'];

    public function toggleComplete(){
        $this->completed = !$this->completed;
        $this->save();
    }
}
