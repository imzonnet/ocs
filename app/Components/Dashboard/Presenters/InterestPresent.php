<?php namespace App\Components\Dashboard\Presenters;

use Laracasts\Presenter\Presenter;

class InterestPresent extends Presenter{

    /**
     * @param string $field
     * @return array
     */
    public function selected_categories($field = 'id'){
        $rs = [];
        foreach($this->categories as $category) {
            $rs[] = $category[$field];
        }
        return $rs;
    }
}
