<?php

use App\Models\Product;
use Faker\Factory;

class ProductTest extends TestCase
{
    /**
     * /products [GET]
     */
public function testShouldReturnAllProducts(){
        $token='eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC8xMjcuMC4wLjE6ODAwMFwvYXBpXC9sb2dpbiIsImlhdCI6MTYzMjExODI3MSwiZXhwIjoxNjMyMTIxODcxLCJuYmYiOjE2MzIxMTgyNzEsImp0aSI6ImFrS2MwSzBkS3c2MEtjRVEiLCJzdWIiOjksInBydiI6IjIzYmQ1Yzg5NDlmNjAwYWRiMzllNzAxYzQwMDg3MmRiN2E1OTc2ZjcifQ.IYHG-4m4DVugmPgXEyHmYzEbyNJQa8WId6jakKGg3hk';

        $res=$this->json('GET',"api/products",[],[
            'Authorization' => 'Bearer '.$token
            ]);
        $this->seeStatusCode(200);
        // $this->seeJsonStructure([
        //     'data' => ['*' =>
        //         [
        //             'product_name',
        //             'product_description',
        //             'created_at',
        //             'updated_at',
        //             'links'
        //         ]
        //     ]]);
            
        
    }

    /**
     * /products/id [GET]
     */
    public function testShouldReturnProduct(){
        $token='eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC8xMjcuMC4wLjE6ODAwMFwvYXBpXC9sb2dpbiIsImlhdCI6MTYzMjExODI3MSwiZXhwIjoxNjMyMTIxODcxLCJuYmYiOjE2MzIxMTgyNzEsImp0aSI6ImFrS2MwSzBkS3c2MEtjRVEiLCJzdWIiOjksInBydiI6IjIzYmQ1Yzg5NDlmNjAwYWRiMzllNzAxYzQwMDg3MmRiN2E1OTc2ZjcifQ.IYHG-4m4DVugmPgXEyHmYzEbyNJQa8WId6jakKGg3hk';

        $res=$this->json('GET',"api/products/3",[],[
            'Authorization' => 'Bearer '.$token
            ]);
        $this->seeStatusCode(200);

        // $this->seeJsonStructure(
        //     ['data' =>
        //         [
        //             'product_name',
        //             'product_description',
        //             'created_at',
        //             'updated_at',
        //             'links'
        //         ]
        //     ]    
        // );
        
    }

    /**
     * /products [POST]
     */
    public function testShouldCreateProduct(){

        $token='eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC8xMjcuMC4wLjE6ODAwMFwvYXBpXC9sb2dpbiIsImlhdCI6MTYzMjExODI3MSwiZXhwIjoxNjMyMTIxODcxLCJuYmYiOjE2MzIxMTgyNzEsImp0aSI6ImFrS2MwSzBkS3c2MEtjRVEiLCJzdWIiOjksInBydiI6IjIzYmQ1Yzg5NDlmNjAwYWRiMzllNzAxYzQwMDg3MmRiN2E1OTc2ZjcifQ.IYHG-4m4DVugmPgXEyHmYzEbyNJQa8WId6jakKGg3hk';

        $parameters = [
            'product_name' => 'Infinix',
            'product_description' => 'OPPO 4 6.1-Inch IPS LCD (6GB, 32GB ROM) Android 9.0 ',
        ];

        $this->json('POST',"api/products",$parameters,[
            'Authorization' => 'Bearer '.$token
            ]);
        

        // $this->post("products", $parameters, []);dd($this->post("products", $parameters, []));
        $this->seeStatusCode(200);
        $this->seeJsonStructure(
            ['data' =>
                [
                    'product_name',
                    'product_description',
                    'created_at',
                    'updated_at',
                    'links'
                ]
            ]    
        );
        
    }
    
    /**
     * /products/id [PUT]
     */
    public function testShouldUpdateProduct()
    {
        $token='eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC8xMjcuMC4wLjE6ODAwMFwvYXBpXC9sb2dpbiIsImlhdCI6MTYzMjExODI3MSwiZXhwIjoxNjMyMTIxODcxLCJuYmYiOjE2MzIxMTgyNzEsImp0aSI6ImFrS2MwSzBkS3c2MEtjRVEiLCJzdWIiOjksInBydiI6IjIzYmQ1Yzg5NDlmNjAwYWRiMzllNzAxYzQwMDg3MmRiN2E1OTc2ZjcifQ.IYHG-4m4DVugmPgXEyHmYzEbyNJQa8WId6jakKGg3hk';


        $parameters = [
            'product_name' => 'Nokia Hot Note',
            'product_description' => 'Champagne Gold, 13M AF + 8M FF 4G Smartphone',
        ];
        $this->json('PUT',"api/products/7",$parameters,['Authorization' => 'Bearer'.$token]);
        
        $this->seeStatusCode(200);
        // $this->seeJsonStructure(
        //     ['data' =>
        //         [
        //             'product_name',
        //             'product_description',
        //             'created_at',
        //             'updated_at',
        //             'links'
        //         ]
        //     ]    
        // );
    }

    /**
     * /products/id [DELETE]
     */
    public function testShouldDeleteProduct(){
         $token='eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC8xMjcuMC4wLjE6ODAwMFwvYXBpXC9sb2dpbiIsImlhdCI6MTYzMjExODI3MSwiZXhwIjoxNjMyMTIxODcxLCJuYmYiOjE2MzIxMTgyNzEsImp0aSI6ImFrS2MwSzBkS3c2MEtjRVEiLCJzdWIiOjksInBydiI6IjIzYmQ1Yzg5NDlmNjAwYWRiMzllNzAxYzQwMDg3MmRiN2E1OTc2ZjcifQ.IYHG-4m4DVugmPgXEyHmYzEbyNJQa8WId6jakKGg3hk';

         $this->json('DELETE',"api/products/1",[],['Authorization' => 'Bearer'.$token]);
        $this->seeStatusCode(410);
        $this->seeJsonStructure([
                'status',
                'message'
        ]);
    }

}
