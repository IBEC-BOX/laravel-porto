<?php

namespace AdminKit\Porto\Abstracts\Models;

use AdminKit\Porto\Traits\CyrillicChars;
use Illuminate\Database\Eloquent\Model as LaravelEloquentModel;

abstract class Model extends LaravelEloquentModel
{
    use CyrillicChars;
}
