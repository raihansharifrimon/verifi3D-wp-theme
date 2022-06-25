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
				'label' => esc_html__( 'Images', 'verifi3d-elementor' ),
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
        $item_1 = $items[1];
        $item_2 = $items[2];
        $item_3 = $items[3];
        $item_4 = $items[4];
        $item_5 = $items[5];
        $item_6 = $items[6];
        $item_7 = $items[7];
        $item_8 = $items[8];
        ?>
        <pre>
            <?php 
            var_dump($item_1);
            ?>
        </pre>

		?>
        <section class="product-why-choose overflow-hidden">

            <div class="container">
                <div id="carouselExampleFadeTwo" class="carousel slide carousel-fade" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item caro-item caro-item-one active" data-bs-interval="11000">
                            <div class="image-box">
                                <div class="image-box-one">
                                    <img src="<?= $item_1['slide_images'][0]['image']['url'] ?>" class="d-block w-100" alt="...">
                                </div>
                            </div>
                            <div class="line-container">
                                <div class="line"></div>
                                <div class="line-overlay"></div>
                            </div>
                            <div class="info">
                                <div class="info-one" style="cursor: pointer;" onclick="infoOnee()">
                                    <p><span class="caro-number"> 01 </span> <?= $item_1['title'] ?> </p>
                                    <div class="discription discription-one" style="display: block;">
                                        <ul>
                                            <?php
                                                foreach($item_1['slide_content_list'] as $index => $list_item) {
                                                    ?>
                                                    <li><?= $list_item['list_title']?></li>
                                                    <?php
                                                }
                                            ?>
                                        </ul>
                                        <a href="<?= $item_1['btn_url'] ?>">
                                            <button class="common-btn my-4"><?= $item_1['btn_text'] ?>
                                                <span><i class="fa fa-arrow-right"></i></span></button></a>
                                    </div>
                                </div>
                                <!-- rest list items -->
                                <div class="info-two" style="cursor: pointer;" onclick="infoTwoo()">
                                    <p><span class="caro-number"> 02 </span> <?= $item_2['title'] ?> </p>
                                </div>
                                <div class="info-three" style="cursor: pointer;" onclick="infoThreee()">
                                    <p><span class="caro-number"> 03 </span> <?= $item_3['title'] ?> </p>
                                </div>
                                <div class="info-four" style="cursor: pointer;" onclick="infoFourr()">
                                    <p><span class="caro-number"> 04 </span><?= $item_4['title'] ?>
                                    </p>
                                </div>
                                <div class="info-five" style="cursor: pointer;" onclick="infoFivee()">
                                    <p><span class="caro-number"> 05 </span> <?= $item_5['title'] ?> </p>
                                </div>
                                <div class="info-six" style="cursor: pointer;" onclick="infoSixx()">
                                    <p><span class="caro-number"> 06 </span> <?= $item_6['title'] ?> </p>
                                </div>
                                <div class="info-seven" style="cursor: pointer;" onclick="infoSevenn()">
                                    <p><span class="caro-number"> 07 </span> <?= $item_7['title'] ?> </p>
                                </div>
                                <div class="info-eight" style="cursor: pointer;" onclick="infoEightt()">
                                    <p><span class="caro-number"> 08 </span> <?= $item_8['title'] ?> </p>
                                </div>
                            </div>
                        </div>
                        <!-- item two -->
                        <div class="carousel-item caro-item caro-item-two" data-bs-interval="11000">
                            <div class="image-box">
                                <div class="image-box-two">
                                    <div class="image-one">
                                        <img src="<?= $item_2['slide_images'][0]['image']['url'] ?>" alt="" data-aos="zoom-in" data-aos-delay="300">
                                    </div>
                                    <div class="image-two">
                                        <img src="<?= $item_2['slide_images'][1]['image']['url'] ?>" alt="" data-aos="zoom-in" data-aos-delay="600">
                                    </div>
                                </div>
                            </div>
                            <div class="line-container">
                                <div class="line"></div>
                                <div class="line-overlay"></div>
                            </div>
                            <div class="info">
                                <div class="info-one" style="cursor: pointer;" onclick="infoOnee()">
                                    <p><span class="caro-number"> 01 </span> <?= $item_1['title'] ?> </p>
                                </div>
                                <div class="info-two" style="cursor: pointer;" onclick="infoTwoo()">
                                    <p><span class="caro-number"> 02 </span> <?= $item_2['title'] ?> </p>
                                    <div class="discription discription-two" style="display: block !important;">
                                        <ul>
                                            <li>- Sync models with CDEs/load models locally</li>
                                            <li>- Link several building models into modelsets and perform checks on them
                                            </li>
                                            <li>- Synchronize all 3D model data into a centralized master model</li>
                                            <li>- Collaborate with colleagues and share information in real-time</li>
                                            <li>- No need to convert files and lose data in the process</li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="info-three" style="cursor: pointer;" onclick="infoThreee()">
                                    <p><span class="caro-number"> 03 </span> <?= $item_3['title'] ?> </p>
                                </div>
                                <div class="info-four" style="cursor: pointer;" onclick="infoFourr()">
                                    <p><span class="caro-number"> 04 </span><?= $item_4['title'] ?>
                                    </p>
                                </div>
                                <div class="info-five" style="cursor: pointer;" onclick="infoFivee()">
                                    <p><span class="caro-number"> 05 </span> <?= $item_5['title'] ?> </p>
                                </div>
                                <div class="info-six" style="cursor: pointer;" onclick="infoSixx()">
                                    <p><span class="caro-number"> 06 </span> <?= $item_6['title'] ?> </p>
                                </div>
                                <div class="info-seven" style="cursor: pointer;" onclick="infoSevenn()">
                                    <p><span class="caro-number"> 07 </span> <?= $item_7['title'] ?> </p>
                                </div>
                                <div class="info-eight" style="cursor: pointer;" onclick="infoEightt()">
                                    <p><span class="caro-number"> 08 </span> <?= $item_8['title'] ?> </p>
                                </div>


                                <!-- <div class="info-three" style="cursor: pointer;" onclick="infoThreee()">
                                    <p><span class="caro-number"> 03 </span> Check and improve the quality of building
                                        data </p>
                                </div>
                                <div class="info-four" style="cursor: pointer;" onclick="infoFourr()">
                                    <p><span class="caro-number"> 04 </span> Save time with predefined project templates
                                    </p>
                                </div>
                                <div class="info-five" style="cursor: pointer;" onclick="infoFivee()">
                                    <p><span class="caro-number"> 05 </span> Validates your models efficiently </p>
                                </div>
                                <div class="info-six" style="cursor: pointer;" onclick="infoSixx()">
                                    <p><span class="caro-number"> 06 </span> All your favourite tools integrated in one
                                        place </p>
                                </div>
                                <div class="info-seven" style="cursor: pointer;" onclick="infoSevenn()">
                                    <p><span class="caro-number"> 07 </span> Report issues real-time </p>
                                </div>
                                <div class="info-eight" style="cursor: pointer;" onclick="infoEightt()">
                                    <p><span class="caro-number"> 08 </span> A single solution for model checking </p>
                                </div> -->
                            </div>
                        </div>
                        <!-- item 3 -->
                        <div class="carousel-item caro-item caro-item-three" data-bs-interval="11000">
                            <div class="image-box">
                                <div class="image-box-three">
                                    <img src="<?= plugins_url('../image/3.png')?>">
                                </div>
                            </div>
                            <div class="line-container">
                                <div class="line"></div>
                                <div class="line-overlay"></div>
                            </div>
                            <div class="info">
                                <div class="info-one" style="cursor: pointer;" onclick="infoOnee()">
                                    <p><span class="caro-number"> 01 </span> Cloud-Based Solution </p>
                                </div>
                                <div class="info-two" style="cursor: pointer;" onclick="infoTwoo()">
                                    <p><span class="caro-number"> 02 </span> Simplify Model Coordination </p>
                                </div>
                                <div class="info-three" style="cursor: pointer;" onclick="infoThreee()">
                                    <p><span class="caro-number"> 03 </span> Check and improve the quality of building
                                        data </p>
                                    <div class="discription discription-three" style="display: block;">
                                        <ul>
                                            <li>- Run parametric and property checks on your models</li>
                                            <li>- Classify your data to make sure it fits your workflow in the best way
                                            </li>
                                            <li>- Create and save rules and rulesets</li>
                                            <li>- Simplify and automate the design coordination and model checking
                                                process</li>
                                            <li>- Guarantees that the input building data is reliable and of high
                                                quality</li>
                                        </ul>
                                        <a href="requestTrial.html"><button class="common-btn my-4">Request a trial
                                                <span><i class="fa fa-arrow-right"></i></span></button></a>
                                    </div>
                                </div>
                                <div class="info-four" style="cursor: pointer;" onclick="infoFourr()">
                                    <p><span class="caro-number"> 04 </span> Save time with predefined project templates
                                    </p>
                                </div>
                                <div class="info-five" style="cursor: pointer;" onclick="infoFivee()">
                                    <p><span class="caro-number"> 05 </span> Validates your models efficiently </p>
                                </div>
                                <div class="info-six" style="cursor: pointer;" onclick="infoSixx()">
                                    <p><span class="caro-number"> 06 </span> All your favourite tools integrated in one
                                        place </p>
                                </div>
                                <div class="info-seven" style="cursor: pointer;" onclick="infoSevenn()">
                                    <p><span class="caro-number"> 07 </span> Report issues real-time </p>
                                </div>
                                <div class="info-eight" style="cursor: pointer;" onclick="infoEightt()">
                                    <p><span class="caro-number"> 08 </span> A single solution for model checking </p>
                                </div>
                            </div>
                        </div>
                        <!-- item 4 -->
                        <div class="carousel-item caro-item caro-item-four" data-bs-interval="11000">
                            <div class="image-box">
                                <div class="image-box-four">
                                    <img src="img/product/Verifi3D.png" class="d-block w-100" alt="..." data-aos="zoom-in">
                                </div>
                            </div>
                            <div class="line-container">
                                <div class="line"></div>
                                <div class="line-overlay"></div>
                            </div>
                            <div class="info">
                                <div class="info-one" style="cursor: pointer;" onclick="infoOnee()">
                                    <p><span class="caro-number"> 01 </span> Cloud-Based Solution </p>
                                </div>
                                <div class="info-two" style="cursor: pointer;" onclick="infoTwoo()">
                                    <p><span class="caro-number"> 02 </span> Simplify Model Coordination </p>
                                </div>
                                <div class="info-three" style="cursor: pointer;" onclick="infoThreee()">
                                    <p><span class="caro-number"> 03 </span> Check and improve the quality of building
                                        data </p>
                                </div>
                                <div class="info-four" style="cursor: pointer;" onclick="infoFourr()">
                                    <p><span class="caro-number"> 04 </span> Save time with predefined project templates
                                    </p>
                                    <div class="discription discription-four" style="display: block;">
                                        <ul>
                                            <li>- Obtain project templates from the Verifi3D Exchange Portal</li>
                                            <li>- Offers a variety of different templates for both IFC and Revit files
                                            </li>
                                            <li>- Download project templates to share, amend, and reuse in other
                                                projects</li>
                                            <li>- Makes the model-checking process easier and more efficient</li>
                                            <li>- Reduce manual errors and automate workflows</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="info-five" style="cursor: pointer;" onclick="infoFivee()">
                                    <p><span class="caro-number"> 05 </span> Validates your models efficiently </p>
                                </div>
                                <div class="info-six" style="cursor: pointer;" onclick="infoSixx()">
                                    <p><span class="caro-number"> 06 </span> All your favourite tools integrated in one
                                        place </p>
                                </div>
                                <div class="info-seven" style="cursor: pointer;" onclick="infoSevenn()">
                                    <p><span class="caro-number"> 07 </span> Report issues real-time </p>
                                </div>
                                <div class="info-eight" style="cursor: pointer;" onclick="infoEightt()">
                                    <p><span class="caro-number"> 08 </span> A single solution for model checking </p>
                                </div>
                            </div>
                        </div>
                        <!-- item 5 -->
                        <div class="carousel-item caro-item caro-item-five" data-bs-interval="11000">
                            <div class="image-box">
                                <div class="image-box-five">
                                    <img src="img/product/caro-5.png" class="d-block w-100" alt="...">
                                </div>
                            </div>
                            <div class="line-container">
                                <div class="line"></div>
                                <div class="line-overlay"></div>
                            </div>
                            <div class="info">
                                <div class="info-one" style="cursor: pointer;" onclick="infoOnee()">
                                    <p><span class="caro-number"> 01 </span> Cloud-Based Solution </p>
                                </div>
                                <div class="info-two" style="cursor: pointer;" onclick="infoTwoo()">
                                    <p><span class="caro-number"> 02 </span> Simplify Model Coordination </p>
                                </div>
                                <div class="info-three" style="cursor: pointer;" onclick="infoThreee()">
                                    <p><span class="caro-number"> 03 </span> Check and improve the quality of building
                                        data </p>
                                </div>
                                <div class="info-four" style="cursor: pointer;" onclick="infoFourr()">
                                    <p><span class="caro-number"> 04 </span> Save time with predefined project templates
                                    </p>
                                </div>
                                <div class="info-five" style="cursor: pointer;" onclick="infoFivee()">
                                    <p><span class="caro-number"> 05 </span> Validates your models efficiently </p>
                                    <div class="discription discription-five" style="display: block;">
                                        <ul>
                                            <li>- Identify and resolve issues in the early stages of the process</li>
                                            <li>- Customize checks and validations based on project requirements</li>
                                            <li>- Use/reuse filters to efficiently perform checks and detect clashes
                                            </li>
                                            <li>- Validate BIM data, automate, and reduce clashes in realtime</li>
                                            <li>- Manage the entire model coordination and data validation workflow in
                                                one place</li>
                                        </ul>


                                        <a class="popup-video" href="https://www.youtube.com/watch?v=kMPsEatK_KU"><button
                                                class="common-btn my-4">Learn more <span><i
                                                        class="fa fa-arrow-right"></i></span></button></a>
                                    </div>
                                </div>
                                <div class="info-six" style="cursor: pointer;" onclick="infoSixx()">
                                    <p><span class="caro-number"> 06 </span> All your favourite tools integrated in one
                                        place </p>
                                </div>
                                <div class="info-seven" style="cursor: pointer;" onclick="infoSevenn()">
                                    <p><span class="caro-number"> 07 </span> Report issues real-time </p>
                                </div>
                                <div class="info-eight" style="cursor: pointer;" onclick="infoEightt()">
                                    <p><span class="caro-number"> 08 </span> A single solution for model checking </p>
                                </div>
                            </div>
                        </div>
                        <!-- item 6 -->
                        <div class="carousel-item caro-item caro-item-six" data-bs-interval="11000">
                            <div class="image-box six-image-box">
                                <div class="image-box-six">
                                    <div class="center-image">
                                        <img src="img/product/caro-8-6-center.png" alt="">
                                    </div>
                                    <div class="center-line-one"></div>
                                    <div class="center-line-two"></div>
                                    <div class="center-line-three"></div>
                                    <div class="center-line-four"></div>
                                    <div class="center-line-five"></div>
                                    <div class="image-one ">
                                        <img src="img/product/verifi3d_exchange_logo_ai.png" alt="">
                                    </div>
                                    <div class="image-two">
                                        <img src="img/product/caro-6-2.png" alt="">
                                    </div>
                                    <div class="image-three">
                                        <img src="img/product/caro-6-3.png" alt="">
                                    </div>
                                    <div class="image-four">
                                        <img src="img/product/caro-6-4.png" alt="">
                                    </div>
                                    <div class="image-five">
                                        <img src="img/product/caro-6-5.png" alt="">
                                    </div>
                                </div>
                            </div>
                            <div class="line-container">
                                <div class="line"></div>
                                <div class="line-overlay"></div>
                            </div>
                            <div class="info">
                                <div class="info-one" style="cursor: pointer;" onclick="infoOnee()">
                                    <p><span class="caro-number"> 01 </span> Cloud-Based Solution </p>
                                </div>
                                <div class="info-two" style="cursor: pointer;" onclick="infoTwoo()">
                                    <p><span class="caro-number"> 02 </span> Simplify Model Coordination </p>
                                </div>
                                <div class="info-three" style="cursor: pointer;" onclick="infoThreee()">
                                    <p><span class="caro-number"> 03 </span> Check and improve the quality of building
                                        data </p>
                                </div>
                                <div class="info-four" style="cursor: pointer;" onclick="infoFourr()">
                                    <p><span class="caro-number"> 04 </span> Save time with predefined project templates
                                    </p>
                                </div>
                                <div class="info-five" style="cursor: pointer;" onclick="infoFivee()">
                                    <p><span class="caro-number"> 05 </span> Validates your models efficiently </p>
                                </div>
                                <div class="info-six" style="cursor: pointer;" onclick="infoSixx()">
                                    <p><span class="caro-number"> 06 </span> All your favourite tools integrated in one
                                        place </p>
                                    <div class="discription discription-six" style="display: block;">
                                        <ul>
                                            <li>- Seamless integration with CDEs </li>
                                            <li>- Supports Autodesk Construction Cloud and Autodesk BIM 360, and issue
                                                trackers such as
                                                Autodesk BIM 360 Issues, BIM Track and BIMcollab
                                            </li>
                                            <li>- Report issues or clashes real-time </li>
                                            <li>- Assign them to project members within Verifi3D </li>
                                            <li>- Sync them with issue trackers in real time</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="info-seven" style="cursor: pointer;" onclick="infoSevenn()">
                                    <p><span class="caro-number"> 07 </span> Report issues real-time </p>
                                </div>
                                <div class="info-eight" style="cursor: pointer;" onclick="infoEightt()">
                                    <p><span class="caro-number"> 08 </span> A single solution for model checking </p>
                                </div>
                            </div>
                        </div>
                        <!-- item 7 -->
                        <div class="carousel-item caro-item caro-item-seven" data-bs-interval="11000">
                            <div class="image-box">
                                <div class="image-box-seven">
                                    <img src="img/product/caro-7 (1).png" class="d-block w-100" alt="...">
                                </div>
                            </div>
                            <div class="line-container">
                                <div class="line"></div>
                                <div class="line-overlay"></div>
                            </div>
                            <div class="info">
                                <div class="info-one" style="cursor: pointer;" onclick="infoOnee()">
                                    <p><span class="caro-number"> 01 </span> Cloud-Based Solution </p>
                                </div>
                                <div class="info-two" style="cursor: pointer;" onclick="infoTwoo()">
                                    <p><span class="caro-number"> 02 </span> Simplify Model Coordination </p>
                                </div>
                                <div class="info-three" style="cursor: pointer;" onclick="infoThreee()">
                                    <p><span class="caro-number"> 03 </span> Check and improve the quality of building
                                        data </p>
                                </div>
                                <div class="info-four" style="cursor: pointer;" onclick="infoFourr()">
                                    <p><span class="caro-number"> 04 </span> Save time with predefined project templates
                                    </p>
                                </div>
                                <div class="info-five" style="cursor: pointer;" onclick="infoFivee()">
                                    <p><span class="caro-number"> 05 </span> Validates your models efficiently </p>
                                </div>
                                <div class="info-six" style="cursor: pointer;" onclick="infoSixx()">
                                    <p><span class="caro-number"> 06 </span> All your favourite tools integrated in one
                                        place </p>
                                </div>
                                <div class="info-seven" style="cursor: pointer;" onclick="infoSevenn()">
                                    <p><span class="caro-number"> 07 </span> Report issues real-time </p>
                                    <div class="discription discription-seven" style="display: block;">
                                        <ul>
                                            <li>- Manage issues real-time with your team</li>
                                            <li>- Create Filters and FilterSets</li>
                                            <li>- Report and assig issues to issue trackers via a BCF file</li>
                                            <li>- Use quantity takeoffs and Excel to export them and keep the entire
                                                team up to date</li>
                                            <li>- Save time and create better BIM models</li>
                                        </ul>

                                    </div>
                                </div>
                                <div class="info-eight" style="cursor: pointer;" onclick="infoEightt()">
                                    <p><span class="caro-number"> 08 </span> A single solution for model checking </p>
                                </div>
                            </div>
                        </div>
                        <!-- item 8 -->
                        <div class="carousel-item caro-item caro-item-eight" data-bs-interval="11000">
                            <div class="image-box">
                                <div class="image-box-eight">
                                    <div class="center-image">
                                        <img src="img/product/caro-8-6-center.png" alt="">
                                    </div>
                                    <div class="image-one-arrow">
                                    </div>
                                    <div class="image-one">
                                        <img class="zoom-effect" src="img/product/caro-8-1.png" alt="">
                                    </div>
                                    <div class="image-two-arrow">
                                    </div>
                                    <div class="image-two">
                                        <img class="zoom-effect" src="img/product/caro-8-2.png" alt="">
                                    </div>
                                    <div class="image-three-arrow">
                                    </div>
                                    <div class="image-three">
                                        <img class="zoom-effect" src="img/product/caro-8-3.png" alt="">
                                    </div>
                                </div>
                            </div>
                            <div class="line-container">
                                <div class="line"></div>
                                <div class="line-overlay"></div>
                            </div>
                            <div class="info">
                                <div class="info-one" style="cursor: pointer;" onclick="infoOnee()">
                                    <p><span class="caro-number"> 01 </span> Cloud-Based Solution </p>
                                </div>
                                <div class="info-two" style="cursor: pointer;" onclick="infoTwoo()">
                                    <p><span class="caro-number"> 02 </span> Simplify Model Coordination </p>
                                </div>
                                <div class="info-three" style="cursor: pointer;" onclick="infoThreee()">
                                    <p><span class="caro-number"> 03 </span> Check and improve the quality of building
                                        data </p>
                                </div>
                                <div class="info-four" style="cursor: pointer;" onclick="infoFourr()">
                                    <p><span class="caro-number"> 04 </span> Save time with predefined project templates
                                    </p>
                                </div>
                                <div class="info-five" style="cursor: pointer;" onclick="infoFivee()">
                                    <p><span class="caro-number"> 05 </span> Validates your models efficiently </p>
                                </div>
                                <div class="info-six" style="cursor: pointer;" onclick="infoSixx()">
                                    <p><span class="caro-number"> 06 </span> All your favourite tools integrated in one
                                        place </p>
                                </div>
                                <div class="info-seven" style="cursor: pointer;" onclick="infoSevenn()">
                                    <p><span class="caro-number"> 07 </span> Report issues real-time </p>
                                </div>
                                <div class="info-eight" style="cursor: pointer;" onclick="infoEightt()">
                                    <p><span class="caro-number"> 08 </span> A single solution for model checking </p>
                                    <div class="discription discription-eight" style="display: block;">
                                        <ul>
                                            <li>- Simplify and automate your model checking workflow</li>
                                            <li>- Easy to use and no training required</li>
                                            <li>- Design and build sustainably and lower your carbon footprint</li>
                                            <li>- Improve building performance</li>
                                            <li>- Reduce construction cost and minimise the need for rework</li>
                                        </ul>
                                        <a href="requestTrial.html"><button class="common-btn my-4">Request a trial
                                                <span><i class="fa fa-arrow-right"></i></span></button></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFadeTwo"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFadeTwo"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
            </section>
            <!-- for mobile -->
            <section class="product-why-mobile overflow-hidden">
                <div class="row">
                    <div class="col-md-12 container">
                        <div class="image-box-mobile">
                            <img src="img/product/Untitled-66.png" class="d-block w-100" alt="...">
                        </div>
                    </div>
                    <div class="col-md-12 container">
                        <div class="info-mobile" style="cursor: pointer;">
                            <p><span class="caro-number"> 01 </span> Cloud-Based Solution </p>
                            <div class="discription discription-one">
                                <ul>
                                    <li>- Run Verifi3D in a web browser</li>
                                    <li>- No need to install any software on local machines</li>
                                    <li>- No need to transfer or convert files</li>
                                    <li>- Collaborate with colleagues and share information in real-time</li>
                                    <li>- All your work, wherever you are.</li>
                                </ul>
                                <a href="requestTrial.html"><button class="common-btn my-4">Request a trial <span><i
                                                class="fa fa-arrow-right"></i></span></button></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 container">
                        <div class="image-box-mobile image-box-mobile-two">
                            <div class="caro-two-image-one-mobile">
                                <img src="img/product/caro-2-1.png" alt="" data-aos="zoom-in" data-aos-delay="300">
                            </div>
                            <div class="caro-two-image-two-mobile">
                                <img src="img/product/caro-2-2.png" alt="" data-aos="zoom-in" data-aos-delay="600">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 container">
                        <div class="info-mobile" style="cursor: pointer;">
                            <p><span class="caro-number"> 02 </span> Simplify Model Coordination </p>
                            <div class="discription discription-two" style="display: block !important;">
                                <ul>
                                    <li>- Sync models with CDEs/load models locally</li>
                                    <li>- Link several building models into modelsets and perform checks on them</li>
                                    <li>- Synchronize all 3D model data into a centralized master model</li>
                                    <li>- Collaborate with colleagues and share information in real-time</li>
                                    <li>- No need to convert files and lose data in the process</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 container">
                        <div class="image-box-mobile">
                            <img src="img/product/caro-3.png" class="d-block w-100" alt="...">
                        </div>
                    </div>
                    <div class="col-md-12 container">
                        <div class="info-mobile" style="cursor: pointer;">
                            <p><span class="caro-number"> 03 </span> Check and improve the quality of building data </p>
                            <div class="discription discription-three" style="display: block;">
                                <ul>
                                    <li>- Run parametric and property checks on your models</li>
                                    <li>- Classify your data to make sure it fits your workflow in the best way</li>
                                    <li>- Create and save rules and rulesets</li>
                                    <li>- Simplify and automate the design coordination and model checking process</li>
                                    <li>- Guarantees that the input building data is reliable and of high quality</li>
                                </ul>
                                <a href="requestTrial.html"><button class="common-btn my-4">Request a trial <span><i
                                                class="fa fa-arrow-right"></i></span></button></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 container">
                        <div class="image-box-mobile">
                            <img src="img/product/Verifi3D.png" class="d-block w-100" alt="...">
                        </div>
                    </div>
                    <div class="col-md-12 container">
                        <div class="info-mobile" style="cursor: pointer;">
                            <p><span class="caro-number"> 04 </span> Save time with predefined project templates </p>
                            <div class="discription discription-four" style="display: block;">
                                <ul>
                                    <li>- Obtain project templates from the Verifi3D Exchange Portal</li>
                                    <li>- Offers a variety of different templates for both IFC and Revit files</li>
                                    <li>- Download project templates to share, amend, and reuse in other projects</li>
                                    <li>- Makes the model-checking process easier and more efficient</li>
                                    <li>- Reduce manual errors and automate workflows</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 container">
                        <div class="image-box-mobile">
                            <img src="img/product/caro-5.png" class="d-block w-100" alt="...">
                        </div>
                    </div>
                    <div class="col-md-12 container">
                        <div class="info-mobile" style="cursor: pointer;">
                            <p><span class="caro-number"> 05 </span> Validates your models efficiently </p>
                            <div class="discription discription-five" style="display: block;">
                                <ul>
                                    <li>- Identify and resolve issues in the early stages of the process</li>
                                    <li>- Customize checks and validations based on project requirements</li>
                                    <li>- Use/reuse filters to efficiently perform checks and detect clashes</li>
                                    <li>- Validate BIM data, automate, and reduce clashes in realtime</li>
                                    <li>- Manage the entire model coordination and data validation workflow in one place
                                    </li>
                                </ul>
                                <a class="popup-video" href="https://www.youtube.com/watch?v=kMPsEatK_KU"><button
                                        class="common-btn my-4">Learn more <span><i
                                                class="fa fa-arrow-right"></i></span></button></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 container">
                        <div class="image-box-mobile">
                            <img src="img/product/caro-6-mobile-removebg-preview.png" class="d-block w-100" alt="caro">
                        </div>
                    </div>
                    <div class="col-md-12 container">
                        <div class="info-mobile" style="cursor: pointer;">
                            <p><span class="caro-number"> 06 </span> All your favourite tools integrated in one place </p>
                            <div class="discription discription-six" style="display: block;">
                                <ul>
                                    <li>- Seamless integration with CDEs</li>
                                    <li>-Supports Autodesk Construction Cloud and Autodesk BIM 360, and issue trackers such
                                        as BIM Track and BIMcollab</li>
                                    <li>- Report issues or clashes real-time</li>
                                    <li>- Assign them to project members within Verifi3D</li>
                                    <li>- Sync them with issue trackers in real time</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 container">
                        <div class="image-box-mobile">
                            <img src="img/product/caro-7 (1).png" class="d-block w-100" alt="...">
                        </div>
                    </div>
                    <div class="col-md-12 container">
                        <div class="info-mobile" style="cursor: pointer;">
                            <p><span class="caro-number"> 07 </span> Report issues real-time </p>
                            <div class="discription discription-seven" style="display: block;">
                                <ul>
                                    <li>- Manage issues real-time with your team</li>
                                    <li>- Create Filters and FilterSets</li>
                                    <li>- Report and assig issues to issue trackers via a BCF file</li>
                                    <li>- Use quantity takeoffs and Excel to export them and keep the entire team up to date
                                    </li>
                                    <li>- Save time and create better BIM models</li>
                                </ul>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 container">
                        <div class="image-box-mobile image-box-mobile-eight container">
                            <div class="row">
                                <div class="col-md-12">
                                    <img src="img/product/caro-8-6-center.png" class="d-block w-100" alt="...">
                                </div>
                                <div class="col-md-12  image-box-eight-sub-image ">
                                    <div class="image-one-of-eight">
                                        <img class="zoom-effect" src="img/product/caro-8-1.png" alt="">
                                    </div>
                                    <div class="image-two-of-eight">
                                        <img class="zoom-effect" src="img/product/caro-8-2.png" alt="">
                                    </div>
                                    <div class="image-three-of-eight">
                                        <img class="zoom-effect" src="img/product/caro-8-3.png" alt="">
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>
                    <div class="col-md-12 container">
                        <div class="info-mobile" style="cursor: pointer;">
                            <p><span class="caro-number"> 08 </span> A single solution for model checking </p>
                            <div class="discription discription-eight" style="display: block;">
                                <ul>
                                    <li>- Simplify and automate your model checking workflow</li>
                                    <li>- Easy to use and no training required</li>
                                    <li>- Design and build sustainably and lower your carbon footprint</li>
                                    <li>- Improve building performance</li>
                                    <li>- Reduce construction cost and minimise the need for rework</li>
                                </ul>
                                <a href="requestTrial.html"><button class="common-btn my-4">Request a trial <span><i
                                                class="fa fa-arrow-right"></i></span></button></a>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
                </div>
            </section>
        <script>
            //Product Carousel Js//
            var infoOne = document.querySelector('.info-one');
            var infoTwo = document.querySelector('.info-two');
            var infoThree = document.querySelector('.info-three');
            var infoFour = document.querySelector('.info-four');
            var infoFive = document.querySelector('.info-five');
            var infoSix = document.querySelector('.info-six');
            var infoSeven = document.querySelector('.info-seven');
            var infoEight = document.querySelector('.info-eight');

            var caroOne = document.querySelector('.caro-item-one');
            var caroTwo = document.querySelector('.caro-item-two');
            var caroThree = document.querySelector('.caro-item-three');
            var caroFour = document.querySelector('.caro-item-four');
            var caroFive = document.querySelector('.caro-item-five');
            var caroSix = document.querySelector('.caro-item-six');
            var caroSeven = document.querySelector('.caro-item-seven');
            var caroEight = document.querySelector('.caro-item-eight');

            function infoOnee() {
                caroOne.classList.add('active');
                caroTwo.classList.remove('active');
                caroThree.classList.remove('active');
                caroFour.classList.remove('active');
                caroFive.classList.remove('active');
                caroSix.classList.remove('active');
                caroSeven.classList.remove('active');
                caroEight.classList.remove('active');
            }
            function infoTwoo() {
                caroOne.classList.remove('active');
                caroTwo.classList.add('active');
                caroThree.classList.remove('active');
                caroFour.classList.remove('active');
                caroFive.classList.remove('active');
                caroSix.classList.remove('active');
                caroSeven.classList.remove('active');
                caroEight.classList.remove('active');
            }
            function infoThreee() {
                caroOne.classList.remove('active');
                caroTwo.classList.remove('active');
                caroThree.classList.add('active');
                caroFour.classList.remove('active');
                caroFive.classList.remove('active');
                caroSix.classList.remove('active');
                caroSeven.classList.remove('active');
                caroEight.classList.remove('active');
            }
            function infoFourr() {
                caroOne.classList.remove('active');
                caroTwo.classList.remove('active');
                caroThree.classList.remove('active');
                caroFour.classList.add('active');
                caroFive.classList.remove('active');
                caroSix.classList.remove('active');
                caroSeven.classList.remove('active');
                caroEight.classList.remove('active');
            }
            function infoFivee() {
                caroOne.classList.remove('active');
                caroTwo.classList.remove('active');
                caroThree.classList.remove('active');
                caroFour.classList.remove('active');
                caroFive.classList.add('active');
                caroSix.classList.remove('active');
                caroSeven.classList.remove('active');
                caroEight.classList.remove('active');
            }
            function infoSixx() {
                caroOne.classList.remove('active');
                caroTwo.classList.remove('active');
                caroThree.classList.remove('active');
                caroFour.classList.remove('active');
                caroFive.classList.remove('active');
                caroSix.classList.add('active');
                caroSeven.classList.remove('active');
                caroEight.classList.remove('active');
            }
            function infoSevenn() {
                caroOne.classList.remove('active');
                caroTwo.classList.remove('active');
                caroThree.classList.remove('active');
                caroFour.classList.remove('active');
                caroFive.classList.remove('active');
                caroSix.classList.remove('active');
                caroSeven.classList.add('active');
                caroEight.classList.remove('active');
            }
            function infoEightt() {
                caroOne.classList.remove('active');
                caroTwo.classList.remove('active');
                caroThree.classList.remove('active');
                caroFour.classList.remove('active');
                caroFive.classList.remove('active');
                caroSix.classList.remove('active');
                caroSeven.classList.remove('active');
                caroEight.classList.add('active');
            }

            //Aos Animation
            AOS.init({
                duration: 1500,
                easing: 'ease',
                once: true,
            });

        </script>
           
		<?php

	}

}