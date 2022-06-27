<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Elementor Calendar
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class Calendar extends \Elementor\Widget_Base {
	public function get_name() {
		return 'Calendar';
	}

	public function get_title() {
		return esc_html__( 'Calender', 'verifi3d-elementor' );
	}

	public function get_icon() {
		return 'eicon-calendar';
	}

	public function get_custom_help_url() {
		return 'https://developers.elementor.com/docs/widgets/';
	}

	public function get_categories() {
		return [ 'verifi3d' ];
	}

	public function get_keywords() {
		return [ 'calendar', 'verifi3d' ];
	}

	protected function register_controls() {

	}

    // HTML content render from here
	protected function render() {
		$settings = $this->get_settings_for_display();

		?>
        <div class="calender">
			<div class="month">
			<ul>
				<li class="prev">&#10094;</li>
				<li class="next">&#10095;</li>
				<li>
				June<br /><span style="font-size: 18px">2022</span>
				</li>
			</ul>
			</div>

			<ul class="weekdays">
				<li>Mo</li>
				<li>Tu</li>
				<li>We</li>
				<li>Th</li>
				<li>Fr</li>
				<li>Sa</li>
				<li>Su</li>
			</ul>
			<ul class="days">
				<li>1</li>
				<li>2</li>
				<li>3</li>
				<li>4</li>
				<li>5</li>
				<li>6</li>
				<li>7</li>
				<li>8</li>
				<li>9</li>
				<li><span class="active">10</span></li>
				<li>11</li>
				<li>12</li>
				<li>13</li>
				<li>14</li>
				<li>15</li>
				<li>16</li>
				<li>17</li>
				<li>18</li>
				<li>19</li>
				<li>20</li>
				<li>21</li>
				<li>22</li>
				<li>23</li>
				<li>24</li>
				<li>25</li>
				<li>26</li>
				<li>27</li>
				<li>28</li>
				<li>29</li>
				<li>30</li>
				<li>31</li>
			</ul>
		</div>
		<?php

	}

}