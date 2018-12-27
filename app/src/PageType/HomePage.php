<?php

namespace Eklektos\Eklektos\PageType;

use Page;
use SilverStripe\Forms\GridField\GridField;
use SilverStripe\Forms\GridField\GridFieldConfig_RecordEditor;
use SilverStripe\Forms\CheckboxField;
use Eklektos\Eklektos\Model\SliderItem;
use Eklektos\Eklektos\Model\PopularLink;
use Eklektos\Eklektos\Model\CardItem;

class HomePage extends Page
{

	/**
	 * @var string
	 * @config
	 */
	private static $icon = 'app/icons/home.png';

	/**
	 * @var string
	 * @config
	 */
	private static $table_name = 'HomePage';

	/**
	 * @var array
	 * @config
	 */
	private static $db = array(
		'SliderArrows' => 'Boolean',
		'SliderIndicators' => 'Boolean'
	);

	/**
	 * @var array
	 * @config
	 */
	private static $has_many = array(
		'SliderItems' => SliderItem::class,
		'PopularLinks' => PopularLink::class,
		'CardItems' => CardItem::class
	);

	/**
	 * @return FieldList
	 */
	public function getCMSFields() {

		$fields = parent::getCMSFields();

		$fields->addFieldsToTab(
			'Root.Slider',
			array(
				GridField::create(
					'SliderItems',
					'Slider Items',
					$this->SliderItems(),
					GridFieldConfig_RecordEditor::create()
				),
				CheckboxField::create('SliderArrows', 'Arrows'),
				CheckboxField::create('SliderIndicators', 'Indicators')
			)
		);

		$fields->addFieldsToTab(
			'Root.PopularLinks',
			array(
				GridField::create(
					'PopularLinks',
					'Popular Links',
					$this->PopularLinks(),
					GridFieldConfig_RecordEditor::create()
				)
			)
		);

		$fields->addFieldsToTab(
			'Root.Cards',
			array(
				GridField::create(
					'CardItem',
					'Card Items',
					$this->CardItems(),
					GridFieldConfig_RecordEditor::create()
				)
			)
		);

		return $fields;
	}
}
