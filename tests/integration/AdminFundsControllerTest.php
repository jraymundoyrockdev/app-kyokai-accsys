<?php

use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;

/**
 * Class ProductItemTransformerTest
 */
class UsersControllerTest extends ApiTestCase
{
    use MockeryPHPUnitIntegration;

    /**
     * @var Mockery\MockInterface;
     */
    protected $productRepositoryStub;

    /** @test */
    public function it_responds_with_empty_collection_if_index_called_with_no_users()
    {
        
    }

}
