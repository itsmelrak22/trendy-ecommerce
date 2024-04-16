<?php

Class CustomizeOrder extends Model {

    protected $table = 'customize_orders';

    public static function getCustomerCustomOrders($customer_id){
        $self = new self;

        $qry = "
            SELECT A.*, B.first_name, B.last_name, B.email 
            FROM `customize_orders` as A 
            LEFT JOIN `customers` as B 
            ON A.customer_id = B.id
            WHERE A.customer_id = $customer_id
        ";

        return $self->setQuery($qry)->getAll();
    }


}