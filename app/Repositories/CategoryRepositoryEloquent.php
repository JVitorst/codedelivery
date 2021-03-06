<?php

namespace CodeDelivery\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use CodeDelivery\Repositories\CategoryRepository;
use CodeDelivery\Models\Category;
use CodeDelivery\Validators\CategoryValidator;

/**
 * Class CategoryRepositoryEloquent
 * @package namespace CodeDelivery\Repositories;
 */
class CategoryRepositoryEloquent extends BaseRepository implements CategoryRepository
{

    public function lists($columns = null, $key =null){

        return $this->model->lists('name','id');
    }
   

    /**
     * Specify Model class name
     *
     * @return highlight_string(str)
     */
    public function model()
    {
        return Category::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
