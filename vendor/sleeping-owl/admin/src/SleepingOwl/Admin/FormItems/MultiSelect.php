<?php namespace SleepingOwl\Admin\FormItems;

use Illuminate\Database\Eloquent\Collection;

class MultiSelect extends Select{

	protected $view = 'multiselect';

	public function value(){
		$value = parent::value();
		if ($value instanceof Collection  && $value->count() > 0)
		{
			$value = $value->lists($value->first()->getKeyName());
		}
		if ($value instanceof Collection)
		{
			$value = $value->toArray();
		}
		
		$value = explode(',', $value);
		
		return $value;
	}

	public function valueSave(){
		$value = parent::value();
		if ($value instanceof Collection  && $value->count() > 0)
		{
			$value = $value->lists($value->first()->getKeyName());
		}
		if ($value instanceof Collection)
		{
			$value = $value->toArray();
		}
		
		return $value;
	}
	
	public function save(){
		$attribute = $this->attribute();

		$value = implode(',', $this->valueSave());

		$this->instance()->$attribute = $value;
	}
}
