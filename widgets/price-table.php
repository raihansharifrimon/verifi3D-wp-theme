<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Elementor Verify3D Price table
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class Price_Table extends \Elementor\Widget_Base {
	public function get_name() {
		return 'Verify3D Price Table';
	}

	public function get_title() {
		return esc_html__( 'Verify3D Price Table', 'verifi3d-elementor' );
	}

	public function get_icon() {
		return 'eicon-price-table';
	}

	public function get_custom_help_url() {
		return 'https://developers.elementor.com/docs/widgets/';
	}

	public function get_categories() {
		return [ 'verifi3d' ];
	}

	public function get_keywords() {
		return [ 'price', 'price-table' ];
	}

	protected function register_controls() {

        //----------Contents tab------------        
		$this->start_controls_section(
			'left_table',
			[
				'label' => esc_html__( 'Left table Content', 'verifi3d-elementor' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

        /* Start repeater */
		$repeater = new \Elementor\Repeater();

        $repeater->add_control(
			'list_title',
			[
				'label' => esc_html__( 'Text', 'verifi3d-elementor' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'label_block' => true,
			]
		);

		$repeater->add_control(
			'icon',
			[
                'fields' => $repeater->get_controls(),
				'label' => esc_html__( 'Icon', 'verifi3d-elementor' ),
				'type' => \Elementor\Controls_Manager::ICONS,
				'default' => [
					'value' => 'fas fa-star',
					'library' => 'solid',
				],
			]
		);

		// pkg name 
		$this->add_control(
			'left_pkg_name',
			[
				'label' => esc_html__( 'Title', 'verifi3d-elementor' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'placeholder' => __( 'Enter your title', 'verifi3d-elementor' )				
			]
		);

		// year price 
		$this->add_control(
			'left_pkg_year_price',
			[
				'label' => esc_html__( 'Year Price', 'verifi3d-elementor' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'placeholder' => __( '$33.99', 'verifi3d-elementor' )				
			]
		);

		// month price 
		$this->add_control(
			'left_pkg_month_price',
			[
				'label' => esc_html__( 'Month Price', 'verifi3d-elementor' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'placeholder' => __( '$33.99', 'verifi3d-elementor' )				
			]
		);

		// promotion text 
		$this->add_control(
			'left_pkg_promote',
			[
				'label' => esc_html__( 'Promote Text', 'verifi3d-elementor' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'placeholder' => __( '30-Day Trial', 'verifi3d-elementor' )				
			]
		);

        // button text
		$this->add_control(
			'left_btn_text',
			[
				'label' => esc_html__( 'Button Text', 'verifi3d-elementor' ),
				'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
				'placeholder' => __( 'Text', 'verifi3d-elementor' )				
			]
		);

		// button url 
		$this->add_control(
			'left_btn_url',
			[
				'label' => esc_html__( 'Button URL', 'verifi3d-elementor' ),
				'type' => \Elementor\Controls_Manager::URL,
				'separator' => 'after',
				'placeholder' => __( '#', 'verifi3d-elementor' ),
				'dynamic' => [
					'active' => true,
				],		
			]
		);

        $this->add_control(
			'features_list',
			[
				'label' => esc_html__( 'Features', 'verifi3d-elementor' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
                'default' => [
					[
						'list_title' => esc_html__( 'Title #1', 'verifi3d-elementor' ),
						'icon' => [
                            'value' => 'fas fa-star',
                            'library' => 'solid',
                        ],
					],
					[
						'list_title' => esc_html__( 'Title #2', 'verifi3d-elementor' ),
						'icon' => [
                            'value' => 'fas fa-star',
                            'library' => 'solid',
                        ],
					],
				],
				'title_field' => '{{{ list_title }}}',
			]
		);
        
		$this->end_controls_section();



        // --------------------------------------------------2d table tab content --------------------------------     
		$this->start_controls_section(
			'middle_table',
			[
				'label' => esc_html__( 'Middle table Content', 'verifi3d-elementor' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

        /* Start repeater */
		$repeater2 = new \Elementor\Repeater();

        $repeater2->add_control(
			'list_title',
			[
				'label' => esc_html__( 'Text', 'verifi3d-elementor' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'label_block' => true,
			]
		);

		$repeater2->add_control(
			'icon',
			[
                'fields' => $repeater2->get_controls(),
				'label' => esc_html__( 'Icon', 'verifi3d-elementor' ),
				'type' => \Elementor\Controls_Manager::ICONS,
				'default' => [
					'value' => 'fas fa-star',
					'library' => 'solid',
				],
			]
		);

		// pkg name 
		$this->add_control(
			'mid_pkg_name',
			[
				'label' => esc_html__( 'Title', 'verifi3d-elementor' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'placeholder' => __( 'Enter your title', 'verifi3d-elementor' )				
			]
		);

		// price 
		$this->add_control(
			'mid_pkg_year_price',
			[
				'label' => esc_html__( 'Year Price', 'verifi3d-elementor' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'placeholder' => __( '$33.99', 'verifi3d-elementor' )				
			]
		);

        // month price 
		$this->add_control(
			'mid_pkg_month_price',
			[
				'label' => esc_html__( 'Month Price', 'verifi3d-elementor' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'placeholder' => __( '$33.99', 'verifi3d-elementor' )				
			]
		);

		// promotion text 
		$this->add_control(
			'mid_pkg_promote',
			[
				'label' => esc_html__( 'Promote Text', 'verifi3d-elementor' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'placeholder' => __( '30-Day Trial', 'verifi3d-elementor' )				
			]
		);

        // button text
		$this->add_control(
			'mid_btn_text',
			[
				'label' => esc_html__( 'Button Text', 'verifi3d-elementor' ),
				'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
				'placeholder' => __( 'Text', 'verifi3d-elementor' )				
			]
		);

		// button url 
		$this->add_control(
			'mid_btn_url',
			[
				'label' => esc_html__( 'Button URL', 'verifi3d-elementor' ),
				'type' => \Elementor\Controls_Manager::URL,
				'separator' => 'after',
				'placeholder' => __( '#', 'verifi3d-elementor' ),
				'dynamic' => [
					'active' => true,
				],		
			]
		);


        $this->add_control(
			'mid_features_list',
			[
				'label' => esc_html__( 'Features', 'verifi3d-elementor' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
                'default' => [
					[
						'list_title' => esc_html__( 'Title #1', 'verifi3d-elementor' ),
						'icon' => [
                            'value' => 'fas fa-star',
                            'library' => 'solid',
                        ],
					],
					[
						'list_title' => esc_html__( 'Title #2', 'verifi3d-elementor' ),
						'icon' => [
                            'value' => 'fas fa-star',
                            'library' => 'solid',
                        ],
					],
				],
				'title_field' => '{{{ list_title }}}',
			]
		);
        
		$this->end_controls_section();



        
        // --------------------------------------------------3rd table tab content --------------------------------     
		$this->start_controls_section(
			'right_table',
			[
				'label' => esc_html__( 'Right table Content', 'verifi3d-elementor' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

        /* Start repeater */
		$repeater3 = new \Elementor\Repeater();

        $repeater3->add_control(
			'list_title',
			[
				'label' => esc_html__( 'Text', 'verifi3d-elementor' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'label_block' => true,
			]
		);

		$repeater3->add_control(
			'icon',
			[
                'fields' => $repeater3->get_controls(),
				'label' => esc_html__( 'Icon', 'verifi3d-elementor' ),
				'type' => \Elementor\Controls_Manager::ICONS,
				'default' => [
					'value' => 'fas fa-star',
					'library' => 'solid',
				],
			]
		);

		// pkg name 
		$this->add_control(
			'right_pkg_name',
			[
				'label' => esc_html__( 'Title', 'verifi3d-elementor' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'placeholder' => __( 'Enter your title', 'verifi3d-elementor' )				
			]
		);

		// price 
		$this->add_control(
			'right_pkg_year_price',
			[
				'label' => esc_html__( 'Year Price', 'verifi3d-elementor' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'placeholder' => __( '$33.99', 'verifi3d-elementor' )				
			]
		);

        // month price 
		$this->add_control(
			'right_pkg_month_price',
			[
				'label' => esc_html__( 'Month Price', 'verifi3d-elementor' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'placeholder' => __( '$33.99', 'verifi3d-elementor' )				
			]
		);

		// promotion text 
		$this->add_control(
			'right_pkg_promote',
			[
				'label' => esc_html__( 'Promote Text', 'verifi3d-elementor' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'placeholder' => __( '30-Day Trial', 'verifi3d-elementor' )				
			]
		);

        // button text
		$this->add_control(
			'right_btn_text',
			[
				'label' => esc_html__( 'Button Text', 'verifi3d-elementor' ),
				'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
				'placeholder' => __( 'Text', 'verifi3d-elementor' )				
			]
		);

		// button url 
		$this->add_control(
			'right_btn_url',
			[
				'label' => esc_html__( 'Button URL', 'verifi3d-elementor' ),
				'type' => \Elementor\Controls_Manager::URL,
				'separator' => 'after',
				'placeholder' => __( '#', 'verifi3d-elementor' ),
				'dynamic' => [
					'active' => true,
				],		
			]
		);

        $this->add_control(
			'right_features_list',
			[
				'label' => esc_html__( 'Features', 'verifi3d-elementor' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
                'default' => [
					[
						'list_title' => esc_html__( 'Title #1', 'verifi3d-elementor' ),
						'icon' => [
                            'value' => 'fas fa-star',
                            'library' => 'solid',
                        ],
					],
					[
						'list_title' => esc_html__( 'Title #2', 'verifi3d-elementor' ),
						'icon' => [
                            'value' => 'fas fa-star',
                            'library' => 'solid',
                        ],
					],
				],
				'title_field' => '{{{ list_title }}}',
			]
		);
        
		$this->end_controls_section();
	}

    // HTML content render from here
	protected function render() {
		$settings = $this->get_settings_for_display();
        $features_list_1st = $settings['features_list'];
        $features_list_2nd = $settings['mid_features_list'];
        $features_list_3rd = $settings['right_features_list'];

		?>
        <section class="pricing overflow-hidden">
            <div class="container">
                <div class="switch-btn">
                    <div class="time" style="margin: 10px;">
                        <div class="button-price d-flex align-items-center">
                            <label class="switch-one">
                                <div style="color:  rgb(225, 102, 39); font-weight: 600; margin-left: -68px;margin-top: 5px;"
                                    id="main_content">Monthly</div>
                                <input type="checkbox">
                                <span class="slider round"></span>
                            </label>
                            <div style="color:  rgb(225, 102, 39); font-weight: 600; margin-left: 10px;"
                                id="secondary_content">Annually</div>
                        </div>
                    </div>
                </div>
                <div class="pricing-content">
                    <div class="pricing-card p-card-1">
                        <h1><?= $settings['left_pkg_year_price'] ?></h1>
                        <p>per month</p>
                        <h2><?= $settings['left_pkg_promote']?></h2>
                        <ul>
                            <?php 
                                foreach($features_list_1st as $index => $item_1st) {
                                    ?>
                                    <li> 
                                        <i class="<?= $item_1st['icon']['value']?>"></i> 
                                        <?= $item_1st['list_title'] ?>
                                    </li>
                                    <?php
                                }
                            ?>
                        </ul>
                        <a href="<?= $settings['left_btn_url']?>">
                            <button class="pricing-sign-up-btn zoom-effect"><?= $settings['left_btn_text']?></button>
                        </a>
                    </div>

                    <!-- middle one -->
                    <div class="pricing-card p-card-2">
                        <h3><?= $settings['mid_pkg_name']?></h3>
                        <h1 class="euro" ><?= $settings['mid_pkg_month_price']?></h1>
                        <h1 class="euro-yearly"><?= $settings['mid_pkg_year_price']?></h1>
                        <p class="month">per month</p>
                        <p class="year">per year</p>
                        <h2><?= $settings['mid_pkg_promote']?></h2>
                        <ul>
                            <?php 
                                foreach($features_list_2nd as $index => $item_2nd) {
                                    ?>
                                    <li> 
                                        <i class="<?= $item_2nd['icon']['value']?>"></i> 
                                        <?= $item_2nd['list_title'] ?>
                                    </li>
                                    <?php
                                }
                            ?>
                        </ul>
                        <a href="<?= $settings['mid_btn_url']?>">
                            <button class="pricing-sign-up-btn zoom-effect"><?= $settings['mid_btn_text']?></button>
                        </a>
                    </div>


                    <div class="pricing-card p-card-3">
                        <h1><?= $settings['right_pkg_year_price'] ?></h1>
                        <p>per month</p>
                        <h2><?=$settings['right_pkg_promote']?></h2>
                        <ul>
                            <?php 
                                foreach($features_list_3rd as $index => $item_3rd) {
                                    ?>
                                    <li> 
                                        <i class="<?= $item_3rd['icon']['value']?>"></i> 
                                        <?= $item_3rd['list_title'] ?>
                                    </li>
                                    <?php
                                }
                            ?>



                            <!-- <li><i class="fa fa-angle-right" aria-hidden="true"></i> Floating license</li>
                            <li><i class="fa fa-angle-right" aria-hidden="true"></i> Everything on per seat </li>
                            <li><i class="fa fa-angle-right" aria-hidden="true"></i> API integrations</li>
                            <li><i class="fa fa-angle-right" aria-hidden="true"></i> Consultancy services</li> -->
                        </ul>
                        <a href="<?= $settings['right_btn_url']?>">
                            <button class="pricing-sign-up-btn zoom-effect"><?= $settings['right_btn_text']?></button>
                        </a>
                    </div>

                </div>
            </div>
            
        </section>
        <script>

            let mainContent = document.querySelector('#main_content');
            let secondaryContent = document.querySelector('#secondary_content');
            let mainCurrency = document.querySelector('#main_currency');
            var switchOne = document.querySelector('.switch-one input');
            var year = document.querySelector('.year');
            var month = document.querySelector('.month');
            var euro = document.querySelector('.euro');
            var euroYearly = document.querySelector('.euro-yearly');

            switchOne.addEventListener('change', e => {

                year.style.display = e.target.checked ? 'block' : 'none';
                month.style.display = e.target.checked ? 'none' : 'block';
                euroYearly.style.display = e.target.checked ? 'block' : 'none';
                euro.style.display = e.target.checked ? 'none' : 'block';
            });

        </script>
		<?php

	}

}