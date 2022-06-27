<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Elementor Double Tabs.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class Double_Tabs extends \Elementor\Widget_Base {
	public function get_name() {
		return 'Double Tabs';
	}

	public function get_title() {
		return esc_html__( 'Double Tabs', 'verifi3d-elementor' );
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
		return [ 'double-tabs', 'verifi3d' ];
	}

	protected function register_controls() {

        //----------Contents tab------------        
		$this->start_controls_section(
			'content_section',
			[
				'label' => esc_html__( 'Content One', 'verifi3d-elementor' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		// tab label 
		$this->add_control(
			'label',
			[
				'label' => esc_html__( 'Tab label', 'verifi3d-elementor' ),
				'type' => \Elementor\Controls_Manager::TEXT				
			]
		);

		// title 
		$this->add_control(
			'title',
			[
				'label' => esc_html__( 'Title', 'verifi3d-elementor' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'label_block' => true		
			]
		);

		// description 
		$this->add_control(
			'description',
			[
				'label' => esc_html__( 'Description', 'verifi3d-elementor' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'separator' => 'after',
				'placeholder' => __( 'Description', 'verifi3d-elementor' )				
			]
		);

		// button text 
		$this->add_control(
			'btn_text',
			[
				'label' => esc_html__( 'Button Text', 'verifi3d-elementor' ),
				'type' => \Elementor\Controls_Manager::TEXT				
			]
		);

        // link
		$this->add_control(
			'link',
			[
				'label' => esc_html__( 'Link', 'verifi3d-elementor' ),
				'type' => \Elementor\Controls_Manager::URL,
				'separator' => 'after',
				'placeholder' => __( '#', 'verifi3d-elementor' ),
				'dynamic' => [
					'active' => true,
				],		
			]
		);

		// Image link 
		$this->add_control(
			'image_link',
			[
				'label' => esc_html__( 'Image Link', 'verifi3d-elementor' ),
				'type' => \Elementor\Controls_Manager::URL,
				'separator' => 'after',
				'placeholder' => __( '#', 'verifi3d-elementor' ),
				'dynamic' => [
					'active' => true,
				],		
			]
		);

		// image 
		$this->add_control(
			'image',
			[
				'label' => esc_html__( 'Image', 'verifi3d-elementor' ),
				'type' => \Elementor\Controls_Manager::MEDIA				
			]
		);
		$this->end_controls_section();

		// ---------------------------tab 2 ---------------------       
		$this->start_controls_section(
			'content_section_2',
			[
				'label' => esc_html__( 'Content Two', 'verifi3d-elementor' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		// tab label 
		$this->add_control(
			'label_2',
			[
				'label' => esc_html__( 'Tab label', 'verifi3d-elementor' ),
				'type' => \Elementor\Controls_Manager::TEXT				
			]
		);

		// title 
		$this->add_control(
			'title_2',
			[
				'label' => esc_html__( 'Title', 'verifi3d-elementor' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'label_block' => true			
			]
		);

		// description 
		$this->add_control(
			'description_2',
			[
				'label' => esc_html__( 'Description', 'verifi3d-elementor' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'separator' => 'after',
				'placeholder' => __( 'Description', 'verifi3d-elementor' )				
			]
		);

		// button text 
		$this->add_control(
			'btn_text_2',
			[
				'label' => esc_html__( 'Button Text', 'verifi3d-elementor' ),
				'type' => \Elementor\Controls_Manager::TEXT				
			]
		);

        // link
		$this->add_control(
			'link_2',
			[
				'label' => esc_html__( 'Link', 'verifi3d-elementor' ),
				'type' => \Elementor\Controls_Manager::URL,
				'separator' => 'after',
				'placeholder' => __( '#', 'verifi3d-elementor' ),
				'dynamic' => [
					'active' => true,
				],		
			]
		);

        // Image link 
		$this->add_control(
			'image_link_2',
			[
				'label' => esc_html__( 'Image Link', 'verifi3d-elementor' ),
				'type' => \Elementor\Controls_Manager::URL,
				'separator' => 'after',
				'placeholder' => __( '#', 'verifi3d-elementor' ),
				'dynamic' => [
					'active' => true,
				],		
			]
		);

		// image 
		$this->add_control(
			'image_2',
			[
				'label' => esc_html__( 'Image', 'verifi3d-elementor' ),
				'type' => \Elementor\Controls_Manager::MEDIA				
			]
		);
		$this->end_controls_section();

	}

    // HTML content render from here
	protected function render() {
		$settings = $this->get_settings_for_display();

		?>
        <div class="request-content-tab" style="margin-top: -130px;">
			<svg class="hidden">
				<defs>
					<path id="tabshape" d="M80,60C34,53.5,64.417,0,0,0v60H80z" />
				</defs>
			</svg>
			<div class="tabs tabs-style-shape">
				<nav>
					<ul>
						<li onclick="openTabTwo('hugh-2')">
							<a href="#section-shape-1">
								<svg viewBox="0 0 80 60" preserveAspectRatio="none">
									<use xlink:href="#tabshape"></use>
								</svg>
								<span style="font-weight:700"><?= $settings['label']?></span>
							</a>
						</li>
						<li onclick="openTabTwo('christian-2')">
							<a href="#section-shape-2">
								<svg viewBox="0 0 80 60" preserveAspectRatio="none">
									<use xlink:href="#tabshape"></use>
								</svg>
								<svg viewBox="0 0 80 60" preserveAspectRatio="none">
									<use style="fill:#29a9e1 !important" xlink:href="#tabshape">
									</use>
								</svg>
								<span style="font-weight:700; background: #29a9e1;">
								<?= $settings['label_2']?>
								</span>
							</a>
						</li>
					</ul>
				</nav>
			</div>
			<div id="hugh-2" class="request-content-2 request-trial-tab "
				style="display: none;background-color:#FFF3E7; border-top-left-radius:0px ;">
				<a target="_blank" href="<?= $settings['image_link']['url']?>"><img class="zoom-effect" src="<?= $settings['image']['url']?>" alt=""></a>
				<div class="info-request">
					<h4 style="color: #54595f !important; margin-top: 0px !important;">
					<?= $settings['title']?>
				</h4>
					<p style="color: #54595f !important;">
					<?= $settings['description']?>	
				</p>
						<a target="_blank" href="<?= $settings['link']['url']?>">
							<button class="common-btn">
						<?= $settings['btn_text']?>
						</button></a>
				</div>
			</div>
			<div id="christian-2" class="request-content-2 request-trial-tab"
				style="display:flex;border-top-left-radius:0px ; background: #ebf9fd;">
				<a target="_blank" href="<?= $settings['image_link_2']['url']?>"> <img class="zoom-effect" src="<?= $settings['image_2']['url']?>" alt=""></a>
				<div class="info-request">
					<h4 style="color: #54595f; margin-top: 0px !important;"><?= $settings['title_2']?></h4>
					<p style="color: #54595f;"><?= $settings['description_2']?></p>
						<a target="_blank" href="<?= $settings['btn_link_2']['url']?>"><button class="common-btn"><?= $settings['btn_text_2']?></button></a>
				</div>
			</div>
		</div>
		<script>
			function openTabTwo(tabName) {
				var i;
				var x = document.getElementsByClassName("request-content-2");
				for (i = 0; i < x.length; i++) {
				x[i].style.display = "none";
				}
				document.getElementById(tabName).style.display = "flex";

			}
		</script>
		<?php

	}

}