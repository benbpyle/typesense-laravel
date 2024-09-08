<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use BaoPham\DynamoDb\DynamoDbModel;

class Todo extends DynamoDbModel
{
    use HasFactory;

    protected $primaryKey = 'id';   // required
}
