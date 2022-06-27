<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Elementor Vertical Slider
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class Vertical_Slider extends \Elementor\Widget_Base {
	public function get_name() {
		return 'Vertical Slider';
	}

	public function get_title() {
		return esc_html__( 'Vertical Slider', 'verifi3d-elementor' );
	}

	public function get_icon() {
		return 'eicon-slider-vertical';
	}

	public function get_custom_help_url() {
		return 'https://developers.elementor.com/docs/widgets/';
	}

	public function get_categories() {
		return [ 'verifi3d' ];
	}

	public function get_keywords() {
		return [ 'product', 'slider' ];
	}

	protected function register_controls() {

        //----------Contents tab ------------ 
        $this->start_controls_section(
			'content',
			[
				'label' => esc_html__( 'Content', 'verifi3d-elementor' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);    

		/* Start repeater */
		$repeater = new \Elementor\Repeater();
		$repeater2 = new \Elementor\Repeater();
		$repeater3 = new \Elementor\Repeater();

        // title
		$repeater->add_control(
			'title',
			[
				'label' => esc_html__( 'Title', 'verifi3d-elementor' ),
				'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
				'placeholder' => __( 'Text', 'verifi3d-elementor' )				
			]
		);
        // button text
		$repeater->add_control(
			'btn_text',
			[
				'label' => esc_html__( 'Button Text', 'verifi3d-elementor' ),
				'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
				'placeholder' => __( 'Text', 'verifi3d-elementor' )				
			]
		);

		// button url 
		$repeater->add_control(
			'btn_url',
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

		// Image large
		$repeater3->add_control(
			'image',
			[
				'label' => esc_html__( 'Image', 'verifi3d-elementor' ),
				'type' => \Elementor\Controls_Manager::MEDIA,				
			]
		);

        // inner list        
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
                'fields' => $repeater->get_controls(),
				'label' => esc_html__( 'Icon', 'verifi3d-elementor' ),
				'type' => \Elementor\Controls_Manager::ICONS,
				'default' => [
					'value' => 'fas fa-star',
					'library' => 'solid',
				],
			]
		);

        // content content list
        $repeater->add_control(
			'slide_content_list',
			[
				'label' => esc_html__( 'Content List', 'verifi3d-elementor' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater2->get_controls(),
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

        // content image list
        $repeater->add_control(
			'slide_images',
			[
				'label' => esc_html__( 'Images (1 or 2 or 4 or 5 items)', 'verifi3d-elementor' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater3->get_controls(),
                'separator' => 'before',
                'title_field' => 'Image',
			]
		);

        // slide list
        $this->add_control(
			'slide_list',
			[
				'label' => esc_html__( 'Slide List', 'verifi3d-elementor' ),
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
				'title_field' => '{{{ title }}}',
			]
		);		
		

		/* End repeater */	

		$this->end_controls_section();

	}

    // HTML content render from here
	protected function render() {
		$settings = $this->get_settings_for_display();
		$items = $settings['slide_list'];

		?>
        <div class="container">
            <div class="product-slider">
                <div id="slideImages" class="product-slider__images">
                <?php
                    foreach($items as $index => $item) {
                        if (count($item['slide_images']) === 2) {
                            ?>
                            <!-- two images -->
                            <div id="slider<?= $index +1 ?>" class="p-slide-item product-slider__img product-slider__img--two">
                                

                                <?php
                                    foreach($item['slide_images'] as $i => $image) {
                                        ?>                                                
                                        <div class="p-slider-two__img">
                                            <img src="<?=$image['image']['url']?>" alt="">
                                        </div>
                                        <?php
                                    }
                                ?>
                            </div>
                            <?php

                        } elseif (count($item['slide_images']) === 4) {
                            ?>
                            <!-- four images -->
                            <div id="slider<?= $index +1 ?>" class="p-slide-item p-slide-item product-slider__img product-slider__img--four">



                                <?php
                                    foreach($item['slide_images'] as $i => $image) {
                                        ?>                                                
                                        <div class="ps-four__img">
                                            <img src="<?=$image['image']['url']?>" alt="">
                                        </div>
                                        <?php
                                    }
                                ?>
                            </div>
                            <?php

                        } elseif (count($item['slide_images']) === 5) {
                            ?>
                            <!-- five images -->                    
                            <div id="slider<?= $index +1 ?>" class="p-slide-item product-slider__img product-slider__img--five">
                                <div class="ps-circle">                            
                                    <div class="ps-center__img">
                                        <img src="img/product/caro-8-6-center.png" alt="">
                                    </div>
                                    <div class="ps-round__indicators">
                                        <div class="line"></div>
                                        <div class="line"></div>
                                        <div class="line"></div>
                                        <div class="line"></div>
                                        <div class="line"></div>
                                    </div>
                                    <div class="ps-round__images">


                                        <?php
                                            foreach($item['slide_images'] as $i => $image) {
                                                ?>                                                
                                                <div class="ps-round__img">
                                                    <img src="<?=$image['image']['url']?>" alt="">
                                                </div>
                                                <?php
                                            }
                                        ?>
                                    </div>
                                </div>
                            </div> 
                            <?php
                            
                        } else {
                            ?>
                            <!-- default -->
                            <div id="slider<?= $index +1 ?>" class="p-slide-item product-slider__img">
                                <?php
                                    foreach($item['slide_images'] as $i => $image) {
                                        ?>
                                        <img src="<?=$image['image']['url']?>" alt="">
                                        <?php
                                    }
                                ?>
                                
                            </div>
                            <?php

                        }
                    }
                ?>

                </div>
                <div id="productSliderDivider" class="product-slider__v-divider active-anim">
                </div>
                <div id="slideContents" class="product-slider__list">
                    <?php
                        foreach($items as $index => $item) {
                            ?>
                            <div id="slider<?= $index +1 ?>" onclick="showContent('slider<?= $index +1 ?>')" class="p-slide-item product-slider__list-item">
                                <h3 class="product-slider__list-title">
                                    <span> <?= $index +1 ?> </span> 
                                    <?= $item['title'] ?>
                                </h3>
                                <ul class="product-slider__sub-list">
                                    <?php
                                        foreach($item['slide_content_list'] as $index => $c_item) {
                                            ?>
                                                <li> <?= $c_item['list_title'] ?></li>
                                            <?php
                                        }
                                    ?>
                                    <?php
                                    if (strlen($item['btn_text']) > 1) {

                                        ?>
                                        <a href="<?= $item['btn_url']['url'] ?>" class="product-slider__list-btn">
                                            <?= $item['btn_text'] ?>
                                            <span><i class="fa fa-arrow-right"></i></span>
                                        </a>
                                        <?php
                                    }
                                    ?>
                                </ul>
                            </div>
                            <?php
                        } 
                    ?>
                </div>
                <div class="product-slider__navigators">
                    <button onclick="prev()" class="product-slider__nav-btn product-slider__nav-btn--left">
                        <span><i class="fa fa-angle-left"></i></span>
                    </button>
                    <button onclick="next()" class="product-slider__nav-btn product-slider__nav-btn--right">
                        <span><i class="fa fa-angle-right"></i></span>
                    </button>
                </div>
            </div>
        </div>
        <script>
            const allslideItems = document.querySelectorAll('.p-slide-item');
            const contentElements = document.querySelectorAll('#slideContents .p-slide-item');
            const middleDivider = document.querySelector('#productSliderDivider');

            let slideIndex = 0;

            function autoPlaySlide(delay) {  
                setInterval(() => {                
                    let id = contentElements[slideIndex].getAttribute('id');
                    
                    showContent(id);

                    if (slideIndex >= (contentElements.length -1)) {                    
                        slideIndex = 0;
                    } else {
                        slideIndex++;                    
                    }
                }, delay);
            }

            function showContent(id) {
                const eventItems = document.querySelectorAll('#'+id);    
                
                if (eventItems && eventItems.length === 2) {
                    middleDivider.classList.remove('active-anim');
                    setTimeout(() => {
                        middleDivider.classList.add('active-anim');
                    }, 10);

                    allslideItems.forEach(_ => {
                        _.classList.remove('active');
                    });

                    eventItems.forEach(_ => {
                        _.classList.add('active');
                    });
                } else {
                    // alert('Please add same DOM ID in related content and image');
                }
            }

            function prev() {
                if (slideIndex > 0) {
                    slideIndex--;
                    let id = contentElements[slideIndex].getAttribute('id');
                    showContent(id);
                } else {
                    slideIndex = 0;
                }
            }

            function next() {
                if (slideIndex >= (contentElements.length -1)) {                    
                    slideIndex = contentElements.length - 1;
                } else {
                    slideIndex++;
                    let id = contentElements[slideIndex].getAttribute('id');
                    showContent(id);             
                }
            }

            autoPlaySlide(9000)
        </script>           
		<?php

	}

}