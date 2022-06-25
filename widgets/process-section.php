<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Elementor Process 
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class Process_Section extends \Elementor\Widget_Base {
	public function get_name() {
		return 'Process';
	}

	public function get_title() {
		return esc_html__( 'Process', 'verifi3d-elementor' );
	}

	public function get_icon() {
		return 'eicon-form-vertical';
	}

	public function get_custom_help_url() {
		return 'https://developers.elementor.com/docs/widgets/';
	}

	public function get_categories() {
		return [ 'verifi3d' ];
	}

	public function get_keywords() {
		return [ 'process', 'home' ];
	}

	protected function register_controls() {

        //----------Contents tab------------        
		$this->start_controls_section(
			'content_section',
			[
				'label' => esc_html__( 'Content (Fixed 7 Items)', 'verifi3d-elementor' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		/* Start repeater */

		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'text',
			[
				'label' => esc_html__( 'Text', 'verifi3d-elementor' ),
				'type' => \Elementor\Controls_Manager::TEXT
			]
		);

		$repeater->add_control(
			'icon',
			[
				'label' => esc_html__( 'Icon', 'verifi3d-elementor' ),
				'type' => \Elementor\Controls_Manager::ICONS,
				'default' => [
					'value' => 'fas fa-star',
					'library' => 'solid',
				],
			]
		);

		$this->add_control(
			'list_items',
			[
				'label' => esc_html__( 'List Items', 'verifi3d-elementor' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
			]
		);

		/* End repeater */	

		$this->end_controls_section();

	}

    // HTML content render from here
	protected function render() {
		$settings = $this->get_settings_for_display();
		$items = $settings['list_items'];
		$size =  $settings['image_size']['size'];

		?>
        <section class="main-process overflow-hidden">
            <div class="application-section container" style="position: relative;">
                <div class="line"></div>
                <div class="circle circle-one">
                    <div class="back-circle">
                    </div>
                    <div class="circle-elements">
                        <div class="circle-connector" data-aos="zoom-out" data-aos-delay="200"></div>
                        <div class="circle-dot" style="  border: 4px solid #e16627 ;" data-aos="zoom-out" data-aos-delay="200">
                            <div class="inner-dot" style="background-color: #e16627;"></div>
                        </div>
                        <div class="circle-text" data-aos="zoom-out" data-aos-delay="200">
                            <span class="process-number">01</span> <?= $items[0]['text']?>
                        </div>
                    </div>
                    <div class="mid-circle" data-aos="zoom-out" data-aos-delay="200">
                        <div class="inner-circle">
                            <div class="image-box">
                                <i class="<?= $items[0]['icon']['value']?>"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="circle circle-two">
                    <div class="back-circle">
                    </div>
                    <div class="circle-elements">
                        <div class="circle-connector" data-aos="zoom-out" data-aos-delay="400"></div>
                        <div class="circle-dot" style="  border: 4px solid #2aa9e1 ;" data-aos="zoom-out" data-aos-delay="400">
                            <div class="inner-dot" style="background-color: #2aa9e1;" data-aos="zoom-out" data-aos-delay="400"></div>
                            <div class="circle-text" data-aos="zoom-out" data-aos-delay="400">
                                <span class="process-number">02</span> <?= $items[1]['text']?>
                            </div>
                        </div>
                    </div>
                    <div class="mid-circle" data-aos="zoom-out" data-aos-delay="400">
                        <div class="inner-circle">
                            <div class="image-box">
                                <i class="<?= $items[1]['icon']['value']?>"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="circle circle-three">
                    <div class="back-circle">
                    </div>
                    <div class="circle-elements">
                        <div class="circle-connector" data-aos="zoom-out" data-aos-delay="600"></div>
                        <div class="circle-dot" data-aos="zoom-out" data-aos-delay="600" style="  border: 4px solid #54595f ;">
                            <div class="inner-dot" data-aos="zoom-out" data-aos-delay="600" style="background-color: #54595f;"></div>
                            <div class="circle-text">
                                <span class="process-number">03</span> <?= $items[2]['text']?>
                            </div>
                        </div>
                    </div>
                    <div class="mid-circle" data-aos="zoom-out" data-aos-delay="600">
                        <div class="inner-circle">
                            <div class="image-box">
                                <i class="<?= $items[2]['icon']['value']?>"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="circle circle-four">
                    <div class="back-circle">
                    </div>
                    <div class="circle-elements">
                        <div class="circle-connector" data-aos="zoom-out" data-aos-delay="800"></div>
                        <div class="circle-dot" data-aos="zoom-out" data-aos-delay="800" style="  border: 4px solid #e16627 ;">
                            <div class="inner-dot" data-aos="zoom-out" data-aos-delay="800" style="background-color: #e16627;"></div>
                            <div class="circle-text" data-aos="zoom-out" data-aos-delay="800">
                                <span class="process-number">04</span> <?= $items[3]['text']?>
                            </div>
                        </div>
                    </div>
                    <div class="mid-circle" data-aos="zoom-out" data-aos-delay="800">
                        <div class="inner-circle">
                            <div class="image-box">
                                <i class="<?= $items[3]['icon']['value']?>" style="transform: rotate(90);"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="circle circle-five">
                    <div class="back-circle">
                    </div>
                    <div class="circle-elements">
                        <div class="circle-connector" data-aos="zoom-out" data-aos-delay="1000"></div>
                        <div class="circle-dot" data-aos="zoom-out" data-aos-delay="1000" style="  border: 4px solid #2aa9e1 ;">
                            <div class="inner-dot" data-aos="zoom-out" data-aos-delay="1000" style="background-color: #2aa9e1;"></div>
                            <div class="circle-text" data-aos="zoom-out" data-aos-delay="1000">
                                <span class="process-number">05</span> <?= $items[4]['text']?>
                            </div>
                        </div>
                    </div>
                    <div class="mid-circle" data-aos="zoom-out" data-aos-delay="1000">
                        <div class="inner-circle">
                            <div class="image-box">
                                <i class="<?= $items[4]['icon']['value']?>"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="circle circle-six">
                    <div class="back-circle">
                    </div>
                    <div class="circle-elements">
                        <div class="circle-connector" data-aos="zoom-out" data-aos-delay="1200"></div>
                        <div class="circle-dot" style="  border: 4px solid #54595f ;" data-aos="zoom-out" data-aos-delay="1200">
                            <div class="inner-dot" style="background-color: #54595f;" data-aos="zoom-out" data-aos-delay="1200"></div>
                            <div class="circle-text" data-aos="zoom-out" data-aos-delay="1200">
                                <span class="process-number">06</span> <?= $items[5]['text']?>
                            </div>
                        </div>
                    </div>
                    <div class="mid-circle" data-aos="zoom-out" data-aos-delay="1200">
                        <div class="inner-circle">
                            <div class="image-box">
                                <i class="<?= $items[5]['icon']['value']?>"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="circle circle-seven">
                    <div class="back-circle">
                    </div>
                    <div class="circle-elements">
                        <div class="circle-connector" data-aos="zoom-out" data-aos-delay="1400"></div>
                        <div class="circle-dot" data-aos="zoom-out" data-aos-delay="1400" style="  border: 4px solid #e16627 ;">
                            <div class="inner-dot" data-aos="zoom-out" data-aos-delay="1400" style="background-color: #e16627;"></div>
                            <div data-aos="zoom-out" data-aos-delay="1400" class="circle-text">
                                <span class="process-number">07</span> <?= $items[6]['text']?>
                            </div>
                        </div>
                    </div>
                    <div class="mid-circle" data-aos="zoom-out" data-aos-delay="1400">
                        <div class="inner-circle">
                            <div class="image-box">
                                <i class="<?= $items[6]['icon']['value']?>"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
           
		<?php

	}

}