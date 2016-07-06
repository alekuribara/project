<?php
namespace App\Http\Controllers;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Bus\DispatchesCommands;
use Illuminate\Foundation\Validation\ValidatesRequests;
/**
* Controller
* @extends BaseController
*/
class Controller extends BaseController
{
    use DispatchesCommands, ValidatesRequests;

}
