<?php

namespace App\Models;

class Bantuan extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    public $id;

    /**
     *
     * @var string
     */
    public $name;

    /**
     *
     * @var integer
     */
    public $transaksi_id;

    /**
     *
     * @var integer
     */
    public $kategori_id;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("pbkk");
        $this->setSource("bantuan");
        $this->belongsTo('transaksi_id', 'App\Models\Transaksi', 'id', ['alias' => 'Transaksi']);
        $this->belongsTo('kategori_id', 'App\Models\Kategori', 'id', ['alias' => 'Kategori']);
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Bantuan[]|Bantuan|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null): \Phalcon\Mvc\Model\ResultsetInterface
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Bantuan|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
