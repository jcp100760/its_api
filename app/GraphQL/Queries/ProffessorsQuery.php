<?php
namespace App\graphql\Queries;
use App\Models\Proffessor;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Query;

class ProffessorsQuery extends Query
{
    protected $attributes = [
        "name" => "proffessors",
    ];

    public function type(): Type
    {
        return Type::listOf(GraphQL::type("Proffessor"));
    }
    

    public function resolve($root, $args)
    {
        return Proffessor::all();
    }
}