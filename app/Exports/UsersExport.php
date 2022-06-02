<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Database\Eloquent\Model;
class UsersExport extends Model
{
    
    /**
    * @var string
    */
    protected $table = 'session';

    public function collection()
    {
        return Export::all();
    }
}

