<?php
/**
 * Created by PhpStorm.
 * User: rolf
 * Date: 12/29/18
 * Time: 4:28 PM
 */

namespace Stoad\Models;

use Rolfisub\PrintKeyValue\PrintKeyValue;

class Question1Model
{
    private $pkv;
    private $data;

    public function __construct(PrintKeyValue $pkv, DataExample $dataExample)
    {
        $this->pkv = $pkv;
        $this->data = $dataExample;
    }

    public function getAnswer() {
        return $this->pkv->printKeyValues($this->data->getData());
    }

}