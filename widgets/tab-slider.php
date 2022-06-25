<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Elementor Tab Slider
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class Tab_Slider extends \Elementor\Widget_Base {
	public function get_name() {
		return 'Tab Slider';
	}

	public function get_title() {
		return esc_html__( 'Tab Slider', 'verifi3d-elementor' );
	}

	public function get_icon() {
		return 'eicon-tabs';
	}

	public function get_custom_help_url() {
		return 'https://developers.elementor.com/docs/widgets/';
	}

	public function get_categories() {
		return [ 'verifi3d' ];
	}

	public function get_keywords() {
		return [ 'tab-slider', 'slider', 'home' ];
	}

	protected function register_controls() {

        //----------Contents tab------------        
		$this->start_controls_section(
			'content_section',
			[
				'label' => esc_html__( 'Content', 'verifi3d-elementor' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		/* Start repeater */

		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'tab_label',
			[
				'label' => esc_html__( 'Label', 'verifi3d-elementor' ),
				'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => true
			],
		);

		$repeater->add_control(
			'tab_description',
			[
				'label' => esc_html__( 'Description', 'verifi3d-elementor' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA
			],
		);

		$repeater->add_control(
			'image',
			[
				'label' => esc_html__( 'Image', 'verifi3d-elementor' ),
				'type' => \Elementor\Controls_Manager::MEDIA
			],
		);

		$this->add_control(
			'list_items',
			[
				'label' => esc_html__( 'Tab list (Must 3 items)', 'verifi3d-elementor' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
			]
		);

		/* End repeater */	

		$this->end_controls_section();

        // ----------------style tab-----------		
		$this->start_controls_section(
			'style_section',
			[
				'label' => esc_html__( 'Styles', 'verifi3d-elementor' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);
        
        // ----------------icon size style-----------	
        $this->add_control(
			'image_size',
			[
				'label' => esc_html__( 'Icon Width', 'verifi3d-elementor' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
			]
		);
        
        // ----------------Text style-----------	
        $this->add_control(
			'text_style',
			[
				'label' => esc_html__( 'Text Style', 'verifi3d-elementor' ),
				'type' => \Elementor\Controls_Manager::HEADING,
			]
		);

        // title style
		$this->add_control(
			'text_color',
			[
				'label' => esc_html__( 'Color', 'verifi3d-elementor' ),
				'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#29a9e1',
				'selectors' => [
					'{{WRAPPER}} , .choose-item h3' => 'color: {{VALUE}};',
				],
			]
		);

        // title typography
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'text_typography',
				'selector' => '{{WRAPPER}} .choose-item h3',
			]
		);

        // title shadow
		$this->add_group_control(
			\Elementor\Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'text_shadow',                
				'selector' => '{{WRAPPER}} .choose-item h3',
			]
		);        

        // ----------------box bg Style-----------
        $this->add_control(
			'box_bg_title',            
			[
                'separator' => 'before',
				'label' => esc_html__( 'Background Color', 'verifi3d-elementor' ),
				'type' => \Elementor\Controls_Manager::HEADING
			]
		);

        // divider bg color
		$this->add_control(
			'box_bg_color',
			[
				'label' => esc_html__( 'Color', 'verifi3d-elementor' ),
				'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#ffffff',
				'selectors' => [
					'{{WRAPPER}} .choose-item' => 'background: {{VALUE}};',
				],
			]
		);

		$this->end_controls_section();

	}

    // HTML content render from here
	protected function render() {
		$settings = $this->get_settings_for_display();
		$items = $settings['list_items'];
		$size =  $settings['image_size']['size'];

		?>
          <section class="tab overflow-hidden">
            <section class="carousel-section ">
                <div class="sec-heading">
                    <svg class="hidden">
                        <defs>
                            <path id="tabshape" d="M80,60C34,53.5,64.417,0,0,0v60H80z"></path>
                        </defs>
                    </svg>
                </div>
            </section>
            <div class="tab-main" style="position: relative;">
                <div class="container">
                    <div class="row g-0">
                        <div class="col-lg-8 offset-lg-2 col-md-12 col-sm-12 tab-main-body">
                            <div class="tabs tabs-style-shape">
                                <nav>
                                    <ul>
                                        <li onclick="opentab('classify')">
                                            <a href="javascript:void(0)">
                                                <svg viewBox="0 0 80 60" preserveAspectRatio="none">
                                                    <use xlink:href="#tabshape"></use>
                                                </svg>
                                                <span><?= $items[0]['tab_label']?></span>
                                            </a>
                                        </li>
                                        <li onclick="opentab('validate')">
                                            <a href="javascript:void(0)">
                                                <svg viewBox="0 0 80 60" preserveAspectRatio="none">
                                                    <use xlink:href="#tabshape"></use>
                                                </svg>
                                                <svg viewBox="0 0 80 60" preserveAspectRatio="none">
                                                    <use xlink:href="#tabshape"></use>
                                                </svg>
                                                <span><?= $items[1]['tab_label']?></span>
                                            </a>
                                        </li>
                                        <li onclick="opentab('report')">
                                            <a href="javascript:void(0)">

                                                <svg viewBox="0 0 80 60" preserveAspectRatio="none">
                                                    <use xlink:href="#tabshape"></use>
                                                </svg>
                                                <svg viewBox="0 0 80 60" preserveAspectRatio="none">
                                                    <use xlink:href="#tabshape"></use>
                                                </svg>
                                                <span><?= $items[2]['tab_label']?></span>
                                            </a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                            <div id="classify" class="tab-content" style="background-color: rgb(255, 243, 231); display: block;">
                                <img class="tab-img" width="100%" src="<?= $items[0]['image']['url']?>" alt="...">
                                <p>
                                    <?= $items[0]['tab_description']?>
                                </p>
                            </div>

                            <div id="validate" class="tab-content" style="display: none; background-color: rgb(235, 249, 253);">
                                <img class="tab-img" width="100%" src="<?= $items[1]['image']['url']?>" alt="...">
                                <p><?= $items[1]['tab_description']?>
                                </p>
                            </div>

                            <div id="report" class="tab-content" style="display: none; background-color: rgb(217, 217, 217);">
                                <img class="tab-img" width="100%" src="<?= $items[2]['image']['url']?>" alt="...">
                                <p>
                                    <?= $items[2]['tab_description']?>
                                </p>
                            </div>
                            <div class="tab-indicator prev" id="tabPrev" onclick="tabPrevious()"><i class="fas fa-angle-left" aria-hidden="true"></i></div>
                            <div class="tab-indicator next" id="tabNext" onclick="nextTab()"><i class="fas fa-angle-right" aria-hidden="true"></i></div>

                        </div>
                    </div>
                </div>
            </div>

			<script>
				//Tab Indicator
				let x = document.getElementsByClassName("tab-content");
				let tabNext = document.getElementById("tabNext");
				let tabPrev = document.getElementById("tabPrev");

				let tabs = ['classify','validate','report'];
				let tabCount = 0;

				function opentab(tabName) {
					let i;
					let x = document.getElementsByClassName("tab-content");
					for (i = 0; i < x.length; i++) {
						x[i].style.display = "none";
					}
					document.getElementById(tabName).style.display = "block";
				}

				function tabPrevious(name) {
					if (tabCount >= 1) {
						tabCount--;
					} else {
						tabCount = 0;
					}
					opentab(tabs[tabCount])
				}
				
				function nextTab() {
					if (tabCount < 2) {
						tabCount++;
					} else {
						tabCount = 2;
					}
					opentab(tabs[tabCount])
				}
			</script>
            
        </section>
		<?php

	}

}