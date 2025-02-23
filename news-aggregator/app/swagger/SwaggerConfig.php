<?php

namespace App\Swagger;

/**
 * @OA\Info(
 *      title="News Aggregator API",
 *      version="1.0.0",
 * )
 * 
 * @OA\Server(
 *      url=L5_SWAGGER_CONST_HOST,
 *      description="API Server"
 * )
 * 
 * @OA\SecurityScheme(
 *      securityScheme="BearerAuth",
 *      type="http",
 *      scheme="bearer",
 *      bearerFormat="JWT",
 *      description="Enter your API Token to access protected routes."
 * )
 */
class SwaggerConfig {}
