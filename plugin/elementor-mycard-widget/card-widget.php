<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Elementor_Card_Widget extends \Elementor\Widget_Base {

    public function get_name() {
        return 'card_widget';
    }

    public function get_title() {
        return __( 'Card Widget', 'elementor-card-widget' );
    }

    public function get_icon() {
        return 'eicon-posts-ticker';
    }

    public function get_categories() {
        return [ 'general' ];
    }

    protected function _register_controls() {

        $this->start_controls_section(
            'content_section',
            [
                'label' => __( 'Content', 'elementor-card-widget' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'image',
            [
                'label' => __( 'Image', 'elementor-card-widget' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_control(
            'title',
            [
                'label' => __( 'Title', 'elementor-card-widget' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Card Title', 'elementor-card-widget' ),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'description',
            [
                'label' => __( 'Description', 'elementor-card-widget' ),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __( 'Card description goes here...', 'elementor-card-widget' ),
                'show_label' => true,
            ]
        );

        $this->add_control(
            'link',
            [
                'label' => __( 'Link', 'elementor-card-widget' ),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => 'https://example.com',
                'default' => [
                    'url' => '#',
                ],
            ]
        );

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        ?>
<div class="custom-card">
    <figure class="custom-card-img-box">
        <a href="<?php echo esc_url($settings['link']['url']); ?>">
            <img src="<?php echo esc_url($settings['image']['url']); ?>"
                alt="<?php echo esc_attr($settings['title']); ?>">
        </a>
        <div class="custom-card-bottom-content">
            <div class="custom-card-clearfix">
                <div class="custom-card-icon-box">
                    <!-- Icon here -->
                </div>
                <h4><?php echo esc_html($settings['title']); ?></h4>
            </div>
        </div>
        <div class="custom-card-overlay-box">
            <div class="custom-card-inner-box">
                <div class="custom-card-clearfix">
                    <div class="custom-card-icon-box">
                        <span class="fa fa-bar-chart-o"></span>
                    </div>
                    <h4><?php echo esc_html($settings['title']); ?></h4>
                </div>
                <div class="custom-card-text">
                    <p><?php echo esc_html($settings['description']); ?></p>
                </div>
                <div class="custom-card-link">
                    <a href="<?php echo esc_url($settings['link']['url']); ?>" class="default_link">READ MORE <i
                            class="fa fa-angle-right"></i></a>
                </div>
            </div>
        </div>
    </figure>
</div>
<?php
    }

    protected function _content_template() {
        ?>
<# if ( settings.image.url ) { #>
    <div class="custom-card">
        <figure class="custom-card-img-box">
            <a href="{{ settings.link.url }}">
                <img src="{{ settings.image.url }}" alt="{{ settings.title }}">
            </a>
            <div class="custom-card-bottom-content">
                <div class="custom-card-clearfix">
                    <div class="custom-card-icon-box">
                        <!-- Icon here -->
                    </div>
                    <h4>{{ settings.title }}</h4>
                </div>
            </div>
            <div class="custom-card-overlay-box">
                <div class="custom-card-inner-box">
                    <div class="custom-card-clearfix">
                        <div class="custom-card-icon-box">
                            <span class="fa fa-bar-chart-o"></span>
                        </div>
                        <h4>{{ settings.title }}</h4>
                    </div>
                    <div class="custom-card-text">
                        <p>{{ settings.description }}</p>
                    </div>
                    <div class="custom-card-link">
                        <a href="{{ settings.link.url }}" class="default_link">READ MORE <i
                                class="fa fa-angle-right"></i></a>
                    </div>
                </div>
            </div>
        </figure>
    </div>
    <# } #>
        <?php
    }
}