<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Elementor Tabs.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class Tabs extends \Elementor\Widget_Base {
	public function get_name() {
		return 'Tabs';
	}

	public function get_title() {
		return esc_html__( 'Tabs', 'verifi3d-elementor' );
	}

	public function get_icon() {
		return 'eicon-product-tabs';
	}

	public function get_custom_help_url() {
		return 'https://developers.elementor.com/docs/widgets/';
	}

	public function get_categories() {
		return [ 'verifi3d' ];
	}

	public function get_keywords() {
		return [ 'tabs', 'verifi3d' ];
	}

	protected function register_controls() {

        //----------Contents tab------------        
		$this->start_controls_section(
			'tab_1',
			[
				'label' => esc_html__( 'Content', 'verifi3d-elementor' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		// title 
		$this->add_control(
			'tab_1_title',
			[
				'label' => esc_html__( 'Title', 'verifi3d-elementor' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'placeholder' => __( 'Title', 'verifi3d-elementor' )				
			]
		);

		// description 
		$this->add_control(
			'tab_1_description',
			[
				'label' => esc_html__( 'Description', 'verifi3d-elementor' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'separator' => 'after',
				'placeholder' => __( 'Description', 'verifi3d-elementor' )				
			]
		);		

		$this->end_controls_section();
        // -----------------------------------------------------------tab 2
        
        //----------Contents tab------------        
		$this->start_controls_section(
			'tab_2',
			[
				'label' => esc_html__( 'Content', 'verifi3d-elementor' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		// title 
		$this->add_control(
			'tab_2_title',
			[
				'label' => esc_html__( 'Title', 'verifi3d-elementor' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'placeholder' => __( 'Title', 'verifi3d-elementor' )				
			]
		);

		// description 
		$this->add_control(
			'tab_2_description',
			[
				'label' => esc_html__( 'Description', 'verifi3d-elementor' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'separator' => 'after',
				'placeholder' => __( 'Description', 'verifi3d-elementor' )				
			]
		);		

		$this->end_controls_section();

        // --------------------------------------- tab 3
        
        //----------Contents tab------------        
		$this->start_controls_section(
			'tab_3',
			[
				'label' => esc_html__( 'Content', 'verifi3d-elementor' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		// title 
		$this->add_control(
			'tab_3_title',
			[
				'label' => esc_html__( 'Title', 'verifi3d-elementor' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'placeholder' => __( 'Title', 'verifi3d-elementor' )				
			]
		);

		// description 
		$this->add_control(
			'tab_3_description',
			[
				'label' => esc_html__( 'Description', 'verifi3d-elementor' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'separator' => 'after',
				'placeholder' => __( 'Description', 'verifi3d-elementor' )				
			]
		);		

		$this->end_controls_section();

	}

    // HTML content render from here
	protected function render() {
		$settings = $this->get_settings_for_display();

		?>
        <section class="open-bim-tab">
            <div class="container">
                <div class=" tab-main-body" style="margin-top: 80px !important ;">
                    <div style="max-width: 100%;" class="tabs tabs-style-shape">
                        <nav>
                            <ul>
                                <li onclick="opentab('classify')">
                                    <a href="#section-shape-1">
                                        <svg viewBox="0 0 80 60" preserveAspectRatio="none">
                                            <use xlink:href="#tabshape"></use>
                                        </svg>
                                        <span><?= $settings['tab_1_title'] ?></span>
                                    </a>
                                </li>
                                <li onclick="opentab('validate')">
                                    <a href="#section-shape-2">
                                        <svg viewBox="0 0 80 60" preserveAspectRatio="none">
                                            <use xlink:href="#tabshape"></use>
                                        </svg>
                                        <svg viewBox="0 0 80 60" preserveAspectRatio="none">
                                            <use xlink:href="#tabshape"></use>
                                        </svg>
                                        <span><?= $settings['tab_2_title'] ?></span>
                                    </a>
                                </li>
                                <li onclick="opentab('report')">
                                    <a href="#section-shape-3">

                                        <svg viewBox="0 0 80 60" preserveAspectRatio="none">
                                            <use xlink:href="#tabshape"></use>
                                        </svg>
                                        <svg viewBox="0 0 80 60" preserveAspectRatio="none">
                                            <use xlink:href="#tabshape"></use>
                                        </svg>
                                        <span><?= $settings['tab_3_title'] ?></span>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                    <div id="classify" class="tab-content" style="background-color: #FFF3E7;">

                        <p style="text-align: left; font-size: 15px; padding: 20px 0px;">
                            <?= $settings['tab_1_description'] ?>
                        </p>
                    </div>

                    <div id="validate" class="tab-content open-tab" style="display:none;background-color: #ebf9fd;">
                    <?= $settings['tab_2_description'] ?>
                    </div>

                    <div id="report" class="tab-content" style="display:none;background-color: #d9d9d9 ">
                        <p style="text-align: left; font-size: 16px; padding: 20px 0px;">
                        <?= $settings['tab_3_description'] ?>
                        </p>
                    </div>

                </div>
            </div>
            <svg class="d-none hidden">
                <defs>
                    <path id="tabshape" d="M80,60C34,53.5,64.417,0,0,0v60H80z" />
                </defs>
            </svg>
        </section>
        <script>
            function opentab(tabName) {
                var i;
                var x = document.getElementsByClassName("tab-content");
                for (i = 0; i < x.length; i++) {
                    x[i].style.display = "none";
                }
                document.getElementById(tabName).style.display = "block";
            }

        </script>
		<?php

	}

}