<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Elementor Roi Calculator.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class Roi_Calculator extends \Elementor\Widget_Base {
	public function get_name() {
		return 'Roi Calculator';
	}

	public function get_title() {
		return esc_html__( 'Roi Calculator', 'verifi3d-elementor' );
	}

	public function get_icon() {
		return 'eicon-plus-square-o';
	}

	public function get_custom_help_url() {
		return 'https://developers.elementor.com/docs/widgets/';
	}

	public function get_categories() {
		return [ 'verifi3d' ];
	}

	public function get_keywords() {
		return [ 'Roi-Calculator', 'verifi3d' ];
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

		// title 
		$this->add_control(
			'image',
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
        <section class="roi-calculator overflow-hidden mb-4">
            <div class="container">
                <p>START SAVING TIME</p>
                <h2>ROI Calculator</h2>
                <h5>Check how much you can save per year with Verifi3D.</h5>
                <div id="tab-roi" class="row roi-tab">
                    <div class="col-lg-8 col-md-12 col-sm-12">
                        <div id="roi-tab" class="request-content-tab" style="margin-top: -100px;">
                            <svg class="hidden">
                                <defs>
                                    <path id="tabshape" d="M80,60C34,53.5,64.417,0,0,0v60H80z" />
                                </defs>
                            </svg>
                            <div class="tabs tabs-style-shape">
                                <nav>
                                    <ul>
                                        <li onclick="openTabRoi('why')">
                                            <a href="#section-shape-1">
                                                <svg viewBox="0 0 80 60" preserveAspectRatio="none">
                                                    <use xlink:href="#tabshape"></use>
                                                </svg>
                                                <span style="font-weight:700 ; font-size: 16px;">Why to calculate
                                                    ROI?</span>
                                            </a>
                                        </li>
                                        <li onclick="openTabRoi('how')">
                                            <a href="#section-shape-2">
                                                <svg viewBox="0 0 80 60" preserveAspectRatio="none">
                                                    <use xlink:href="#tabshape"></use>
                                                </svg>
                                                <svg viewBox="0 0 80 60" preserveAspectRatio="none">
                                                    <use style="fill:#29a9e1 !important" xlink:href="#tabshape"></use>
                                                </svg>
                                                <span style="font-weight:700; background: #29a9e1; font-size: 16px;">
                                                    How to
                                                    calculate ROI ?</span>
                                            </a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                            <div id="why" class=" roi-content request-trial-tab " style="display: flex;">

                                <div style="margin:0;" class="info-request">
                                    <p style="color: #54595f !important; margin: 0;">The ROI calculator will enable you
                                        to estimate the
                                        savings you can get with Verifi3D. The algorithm will take into account your
                                        specific
                                        workflow and the tools you’re using to give you a personalized overview of the
                                        benefits
                                        of our service. </p>
                                </div>
                            </div>
                            <div id="how" class="roi-content request-trial-tab" style="display: none;">

                                <div style="margin:0;" class="info-request">
                                    <p style="color: #54595f; margin: 0;">Enter key project details and check how much
                                        you can save per
                                        year with Verifi3D by clicking the “Calculate My Savings!” button.</p>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-12"></div>
                </div>
                <div class="row roi-accordian">
                    <div class="col-lg-8 col-md-8 col-sm-12">
                        <div id="tab-roi" class="accordion" id="accordionExample">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingOne">
                                    <button class="accordion-button" style="border-radius: 15px;" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true"
                                        aria-controls="collapseOne">
                                        Why to calculate ROI?
                                    </button>
                                </h2>
                                <div id="collapseOne" class="accordion-collapse collapse show"
                                    aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        The ROI calculator will enable you to estimate the savings you can get with
                                        Verifi3D. The algorithm will take into account your specific workflow and the
                                        tools you’re using to give you a personalized overview of the benefits of our
                                        service.
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingTwo">
                                    <button class="accordion-button collapsed" style="border-radius: 15px;"
                                        type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo"
                                        aria-expanded="false" aria-controls="collapseTwo">
                                        How to calculate ROI?
                                    </button>
                                </h2>
                                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                                    data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        Enter key project details and check how much you can save per year with Verifi3D
                                        by clicking the “Calculate My Savings!” button.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-ld-4 col-md-4 col-sm-12">

                    </div>
                </div>
                <div
                    class="row d-flex align-items-center  justify-content-sm-around  justify-content-end calculator-area">
                    <div id="roi-one" class="col-lg-8 col-md-8 col-sm-12">
                        <div class="row roi-main">
                            <div class="col-lg-6 col-md-12 col-sm-12">
                                <p for="bim">How many BIM projects you do have per year?</p>
                                <input id="per-year" class="roi-input" type="text" required>
                                <h6>Please enter a number greater than or equal to <span>1</span></h6>
                            </div>
                            <div class="col-lg-6 col-md-12 col-sm-12">
                                <p>Do you use Autodesk BIM360?</p>
                                <div id="bim-value">
                                    <input type="radio" id="bim" name="age" checked value="30">
                                    <label for="bim">yes</label><br>
                                    <input type="radio" id="bim-two" name="age" value="60">
                                    <label for="bim-two">No</label><br>


                                </div>

                            </div>
                            <div class="col-lg-6 col-md-12 col-sm-12">
                                <p>Format type use for the data validation process?</p>
                                <select name="type" id="type">
                                    <option value="RVT">RVT</option>
                                    <option value="IFC">IFC</option>
                                    <option value="Both">Both</option>
                                </select>
                            </div>
                            <div class="col-lg-6 col-md-12 col-sm-12">
                                <p>What issue-tracking solution you use?</p>
                                <select name="issue" id="issue">
                                    <option value="Bim360 Issues">Bim360 Issues</option>
                                    <option value="BimTrack">BimTrack</option>
                                    <option value="BimCollab">BimCollab</option>
                                    <option value="other">Other</option>
                                </select>
                            </div>
                            <button onclick="getInputValue();">Calculate</button>
                        </div>
                    </div>

                    <div id="roi-two" class="col-lg-8 col-md-8 col-sm-12 result-area">
                        <div id="result" class="row roi-result">
                            <h2>Voilà! You have just calculated ROI for your project!</h2>
                            <div class="results-items">
                                <h3>AVERAGE CUSTOMER SAVINGS PER YEAR</h3>
                                <h4> Amount saved: <span>$/€</span> <span id="total_amount_saved"> $'{data}'</span></h4>
                                <h4>Total Days saved: <span id="total_days_saved">330</span></h4>
                                <div class="row my-4">
                                    <div class="col-md-4 col-sm-12">
                                        <div class="progress blue filter_set_bar circle-one">
                                            <span class="progress-left">
                                                <span class="progress-bar"></span>
                                            </span>
                                            <span class="progress-right">
                                                <span class="progress-bar"></span>
                                            </span>
                                            <div class="progress-value" id="filter_set_value"></div>
                                        </div>
                                        <h5>Time saved on filter sets</h5>
                                    </div>
                                    <div class="col-md-4 col-sm-12">
                                        <div class="progress yellow rules_clasing_bar circle-two">
                                            <span class="progress-left">
                                                <span class="progress-bar"></span>
                                            </span>
                                            <span class="progress-right">
                                                <span class="progress-bar"></span>
                                            </span>
                                            <div class="progress-value" id="rules_clashing_value"></div>
                                        </div>
                                        <h5>Time saved on rules clashing</h5>
                                    </div>
                                    <div class="col-md-4 col-sm-12">
                                        <div class="progress blue filter_set_bar  circle-three">
                                            <span class="progress-left">
                                                <span class="progress-bar"></span>
                                            </span>
                                            <span class="progress-right">
                                                <span class="progress-bar"></span>
                                            </span>
                                            <div class="progress-value" id="BIM360_value"></div>
                                        </div>
                                        <h5>Time saved by syncing with BIM360</h5>
                                    </div>
                                </div>

                            </div>
                            <div class="result-buttons">
                                <div class="r-btn">
                                    <a href="requestTrial.html"><button class="common-btn my-4">Get a quote</button></a>
                                    <a href="product.html"><button class="common-btn my-4">See All Features
                                        </button></a>
                                </div>
                                <p>If you would like some help or feedback on your results, please leave us your contact
                                    details and we will get back to you</p>

                                <a href="mailto:info@xinaps.com"><button class="common-btn my-4">Contact Us
                                    </button></a>
                            </div>
                            <p class="disclaimer"><i>Disclaimer: This calculator is an interactive tool that uses the
                                    information that you
                                    supply to provide an estimate of your potential return on investment when using
                                    Verifi3D.The general accuracy of the estimate generated by the calculator will
                                    depend on
                                    how closely the variables chosen by you match your actual circumstances. The results
                                    generated in the calculator are estimates and should only be used as a guide to
                                    evaluate
                                    the potential return on investment. Verifi3D does not and cannot guarantee the
                                    accuracy
                                    or reliability of the results generated by the ROI calculator or that you will
                                    actually
                                    realize any cost savings as forecast by the calculator.</i></p>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-8 col-sm-12 d-flex justify-content-end">
                        <img width="66%" src="./img/Xinaps_ROI_Calculator-removebg-preview.png" alt="">
                    </div>

                </div>
            </div>
            </div>
        </section>
        <script>
           function getInputValue() {
            let roiResult = document.getElementById('roi-two');
            let roiCal = document.getElementById('roi-one');
            let roiTab = document.getElementById('tab-roi');
            roiTab.style.display = "none";
            let perYear = document.getElementById("per-year").value;
            let type = document.getElementById("type").value;
            let issue = document.getElementById("issue").value;
            let bimValue = document.getElementById('bim-value').value;
            let fileTypeRVT = [3128.52, 1440, 1435, 480]
            let fileTypeIFC = [2213.85, 1440, 1, 240]
            let fileTypeBoth = [2671.19, 1440, 718, 360]
            let LicenseSavingsPerYear;
            let HourlyRate = 75;
            let activeFileType = [];
            let autoDeskActive = 1;
            let total_amount_saved = document.getElementById('total_amount_saved');

            if (type == 'RVT') {
                activeFileType = fileTypeRVT;
                LicenseSavingsPerYear = fileTypeRVT[0];
            }
            else if (type == 'IFC') {
                activeFileType = fileTypeIFC;
                LicenseSavingsPerYear = fileTypeIFC[0];
            }
            else {
                activeFileType = fileTypeBoth;
                LicenseSavingsPerYear = fileTypeBoth[0];
            }

            let TimeSavedLicense = Math.ceil((perYear * LicenseSavingsPerYear) / (HourlyRate * 8));
            let TimeSavedFilterSets = Math.ceil((activeFileType[1] * perYear) / (60 * 8));
            let TimeSavedClashing = Math.ceil((activeFileType[2] * perYear) / (60 * 8));
            let TimeSavedBim360 = Math.ceil((activeFileType[3] * perYear * autoDeskActive) / (60 * 8));
            let TimeSaved = TimeSavedLicense + TimeSavedFilterSets + TimeSavedClashing + TimeSavedBim360;
            let CostSaved = TimeSaved * 75 * 8;

            console.log("Type : ", type);
            total_amount_saved.innerText = CostSaved;
            document.getElementById("total_days_saved").innerText = TimeSaved;
            document.getElementById("filter_set_value").innerText = TimeSavedFilterSets + " days";
            document.getElementById("rules_clashing_value").innerText = TimeSavedClashing + " days";
            document.getElementById("BIM360_value").innerText = TimeSavedBim360 + " days";



            console.log('LicenseSavingsPerYear : ', LicenseSavingsPerYear);
            console.log('TimeSavedLicense : ', TimeSavedLicense);
            console.log('TimeSavedFilterSets : ', TimeSavedFilterSets);
            console.log('TimeSavedClashing : ', TimeSavedClashing);
            console.log('TimeSavedBim360 : ', TimeSavedBim360);
            console.log('TimeSaved : ', TimeSaved);
            console.log('CostSaved : ', CostSaved);


            let loadingOneMaxRotate = (360 / 100) * TimeSavedFilterSets;
            loadingOneMaxRotate = (loadingOneMaxRotate >= 360) ? 360 : loadingOneMaxRotate;
            let loadingTwoMaxRotate = (loadingOneMaxRotate >= 180) ? (loadingOneMaxRotate - 180) : 0;
            loadingOneMaxRotate = (loadingOneMaxRotate > 180) ? 180 : loadingOneMaxRotate;

            $.keyframe.define([{
                name: 'loading-1',
                '0%': { 'transform': `rotate(0deg)` },
                '100%': { 'transform': `rotate(${loadingOneMaxRotate}deg)` }
            }]);

            $.keyframe.define([{
                name: 'loading-2',
                '0%': { 'transform': `rotate(0deg)` },
                '100%': { 'transform': `rotate(${loadingTwoMaxRotate}deg)` }
            }]);


            let loadingThreeMaxRotate = (360 / 100) * TimeSavedClashing;
            loadingThreeMaxRotate = (loadingThreeMaxRotate >= 360) ? 360 : loadingThreeMaxRotate;
            let loadingFourMaxRotate = (loadingThreeMaxRotate >= 180) ? (loadingThreeMaxRotate - 180) : 0;
            loadingThreeMaxRotate = (loadingThreeMaxRotate > 180) ? 180 : loadingThreeMaxRotate;

            $.keyframe.define([{
                name: 'loading-3',
                '0%': { 'transform': `rotate(0deg)` },
                '100%': { 'transform': `rotate(${loadingThreeMaxRotate}deg)` }
            }]);

            $.keyframe.define([{
                name: 'loading-4',
                '0%': { 'transform': `rotate(0deg)` },
                '100%': { 'transform': `rotate(${loadingFourMaxRotate}deg)` }
            }]);


            let loadingFiveMaxRotate = (360 / 100) * TimeSavedBim360;
            loadingFiveMaxRotate = (loadingFiveMaxRotate >= 360) ? 360 : loadingFiveMaxRotate;
            let loadingSixMaxRotate = (loadingFiveMaxRotate >= 180) ? (loadingFiveMaxRotate - 180) : 0;
            loadingFiveMaxRotate = (loadingFiveMaxRotate > 180) ? 180 : loadingFiveMaxRotate;

            $.keyframe.define([{
                name: 'loading-5',
                '0%': { 'transform': `rotate(0deg)` },
                '100%': { 'transform': `rotate(${loadingFiveMaxRotate}deg)` }
            }]);

            $.keyframe.define([{
                name: 'loading-6',
                '0%': { 'transform': `rotate(0deg)` },
                '100%': { 'transform': `rotate(${loadingSixMaxRotate}deg)` }
            }]);



            roiCal.style.display = "none";
            roiResult.style.display = "block";

        }
        //Roi Tab
        function openTabRoi(tabName) {
            var i;
            var x = document.getElementsByClassName("roi-content");
            for (i = 0; i < x.length; i++) {
                x[i].style.display = "none";
            }
            document.getElementById(tabName).style.display = "flex";
        }

        </script>
		<?php

	}

}