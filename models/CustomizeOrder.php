<?php

Class CustomizeOrder extends Model {

    protected $table = 'customize_orders';

    public static function getCustomerCustomOrders($customer_id = null, $status = null){
        $self = new self;

        if($customer_id && !$status){
            $qry = "
                SELECT A.*, B.first_name, B.last_name, B.email 
                FROM `customize_orders` as A 
                LEFT JOIN `customers` as B 
                ON A.customer_id = B.id
                WHERE A.customer_id = $customer_id
                AND A.status IS NULL
            ";
        }else if($customer_id && $status){
            $qry = "
                SELECT A.*, B.first_name, B.last_name, B.email 
                FROM `customize_orders` as A 
                LEFT JOIN `customers` as B 
                ON A.customer_id = B.id
                WHERE A.customer_id = $customer_id
                AND A.status = '$status'
            ";
        }else{
            $qry = "
            SELECT A.*, B.first_name, B.last_name, B.email 
            FROM `customize_orders` as A 
            LEFT JOIN `customers` as B 
            ON A.customer_id = B.id
        ";
        }

        return $self->setQuery($qry)->getAll();
    }

    public static function getSpecificCustomOrders($id = null){
        $self = new self;

            $qry = "
                SELECT A.*, B.first_name, B.last_name, B.email 
                FROM `customize_orders` as A 
                LEFT JOIN `customers` as B 
                ON A.customer_id = B.id
                WHERE A.customer_id = $id
            ";

        return $self->setQuery($qry)->getFirst();
    }


}