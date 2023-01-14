<?php
namespace App\GraphQL\Types;
use App\Models\Proffessor;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;

class ProffessorType extends GraphQLType
{
    
    protected $attributes = [
        "name" => "Proffessor",
        "description" => "Listado de todos los profesores",
        "model" => Proffessor::class,
    ];

    public function fields(): array
    {
        return [
            "id" => [
                "type" => Type::nonNull(Type::int()),
                "description" => "Id de un profesor",
            ],
            "name" => [
                "type" => Type::nonNull(Type::string()),
                "description" => "Nombre del profesor",
            ],
            "lastname" => [
                "type" => Type::nonNull(Type::string()),
                "description" => "Apellido del profesor",
            ],
            "ci" => [
                "type" => Type::nonNull(Type::int()),
                "description" => "Cedula de un profesor",
            ],
            "active" => [
                "type" => Type::nonNull(Type::int()),
                "description" => "Indicador de actividad",
            ],
        ];
    }
}