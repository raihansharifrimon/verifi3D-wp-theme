<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Elementor Circle step Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class Circle_Step extends \Elementor\Widget_Base {
	public function get_name() {
		return 'Circle step';
	}

	public function get_title() {
		return esc_html__( 'Circle step', 'verifi3d-elementor' );
	}

	public function get_icon() {
		return 'eicon-circle-o';
	}

	public function get_custom_help_url() {
		return 'https://developers.elementor.com/docs/widgets/';
	}

	public function get_categories() {
		return [ 'verifi3d' ];
	}

	public function get_keywords() {
		return [ 'circle', 'steps'];
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

		// title 
		$repeater->add_control(
			'title',
			[
				'label' => esc_html__( 'Title', 'verifi3d-elementor' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'placeholder' => __( 'Title', 'verifi3d-elementor' ),
                'label_block' => true			
			]
		);

		// Indicator 
		$repeater->add_control(
			'indicator',
			[
				'label' => esc_html__( 'Indicator', 'verifi3d-elementor' ),
				'type' => \Elementor\Controls_Manager::MEDIA		
			]
		);	

		// Indicator 
		$repeater->add_control(
			'icon_image',
			[
				'label' => esc_html__( 'Icon Image', 'verifi3d-elementor' ),
				'type' => \Elementor\Controls_Manager::MEDIA		
			]
		);

        // Indicator 
		$this->add_control(
			'center_image',
			[
				'label' => esc_html__( 'Center Image', 'verifi3d-elementor' ),
				'type' => \Elementor\Controls_Manager::MEDIA		
			]
		);
        
        
        $this->add_control(
			'step_list',
			[
				'label' => esc_html__( 'Step List', 'verifi3d-elementor' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'title_field' => '{{{ title }}}',
			]
		);

		$this->end_controls_section();

	}

    // HTML content render from here
	protected function render() {
		$settings = $this->get_settings_for_display();
        $items = $settings['step_list'];

		?>
           <section class="bim">
            <div class="bim-circle">
                <div class="outer-bim-circle">
                    <div class="inner-bim-circle">
                        <div class="center-piece" data-aos="zoom-in" data-aos-delay="1800">
                            <img src="<?= $settings['center_image']['url']?>" alt="">
                        </div>
                        <div class="open-bim-elements-container">
                            <?php
                                foreach ($items as $index => $item) {
                                    ?>
                                    <div class="open-bim-elements">
                                        <div class="bim-element-circle" data-aos="zoom-in" data-aos-delay="100">
                                            <img src="<?= $item['icon_image']['url']?>" alt="flexibility">
                                        </div>
                                        <div class="bim-element-text" data-aos="zoom-in" data-aos-delay="150">
                                            <div class="bim-arrow">
                                                <img src="<?= $item['indicator']['url']?>" alt="">
                                            </div>
                                            <div class="bim-text">
                                                <div class="bim-text-number"><?= $index + 1 ?></div>
                                                <div class="bim-text-text">
                                                <?= $item['title']?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                }
                            ?>                            
                            
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <script>
            AOS.init({
                duration: 1500,
                easing: 'ease',
                once: true,
            });

        </script>
		<?php

	}

}