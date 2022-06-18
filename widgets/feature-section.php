<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Elementor Section Heading Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class Feature_Section_Widget extends \Elementor\Widget_Base {
	public function get_name() {
		return 'Feature Section';
	}

	public function get_title() {
		return esc_html__( 'Feature Section', 'verifi3d-elementor' );
	}

	public function get_icon() {
		return 'eicon-featured-image';
	}

	public function get_custom_help_url() {
		return 'https://developers.elementor.com/docs/widgets/';
	}

	public function get_categories() {
		return [ 'verifi3d' ];
	}

	public function get_keywords() {
		return [ 'featue', 'icon-box', 'iconbox' ];
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
			'text',
			[
				'label' => esc_html__( 'Text', 'verifi3d-elementor' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'placeholder' => esc_html__( 'List Item', 'verifi3d-elementor' ),
				'default' => esc_html__( 'List Item', 'verifi3d-elementor' ),
				'label_block' => true
				
			]
		);

		$repeater->add_control(
			'icon-image',
			[
				'label' => esc_html__( 'Icon Image', 'verifi3d-elementor' ),
				'type' => \Elementor\Controls_Manager::MEDIA
			],
		);

		$this->add_control(
			'list_items',
			[
				'label' => esc_html__( 'List Items', 'verifi3d-elementor' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),           /* Use our repeater */
				'default' => [
					[
						'text' => esc_html__( 'List Item #1', 'verifi3d-elementor' ),
						'link' => '',
					],
					[
						'text' => esc_html__( 'List Item #2', 'verifi3d-elementor' ),
						'link' => '',
					],
					[
						'text' => esc_html__( 'List Item #3', 'verifi3d-elementor' ),
						'link' => '',
					],
				],
				'title_field' => '{{{ text }}}',
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
			'icon_size',
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
		$size =  $settings['icon_size']['size'];

		?>
           <div class="why-choose-container">
			<?php
				foreach ( $items as $index => $item ) {
				?>
                    <div class="choose-item">
                        <img style="width: <?= $size .'%' ?>" src="<?= $item['icon-image']['url'] ?>" alt="">
                        <h3><?= $item['text'] ?></h3>
                    </div>
				<?php
				}
				?>
                   
            </div>
		<?php

	}

}