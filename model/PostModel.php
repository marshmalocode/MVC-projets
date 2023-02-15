<?php

function postHomepageAll($db){
    $sql="SELECT p.id, p.title, LEFT(p.content, 255) AS contentshort, p.datecreate, u.id AS iduser, u.userscreen,GROUP_CONCAT(c.id) AS idcategory,GROUP_CONCAT(c.title SEPARATOR '||0||') AS titlecategory
    FROM post p
        INNER JOIN user u
            ON p.user_id = u.id
        LEFT JOIN category_has_post h 
            ON p.id = h.post_id
        LEFT JOIN category c 
            ON c.id = h.category_id
            GROUP BY p.id
    ORDER BY p.datecreate ASC";
     try{
        $query = mysqli_query($db,$sql);
     }catch(exception $e){
        die($e->getmessage());
     }
     return mysqli_fetch_all($query,MYSQLI_ASSOC);
}