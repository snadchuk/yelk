<?php
use Elementor\{Controls_Manager, Repeater, Utils};
class Our_Team_Widget extends \Elementor\Widget_Base
{

    public function get_name()
    {
        return 'our_team';
    }

    public function get_title()
    {
        return esc_html__('Our Team', 'yelk');
    }

    public function get_icon()
    {
        return 'eicon-person';
    }

    public function get_categories()
    {
        return ['basic'];
    }

    public function get_keywords()
    {
        return ['our', 'team'];
    }

    protected function register_controls()
    {
        $this->start_controls_section(
            'content_section',
            [
                'label' => esc_html__('Content', 'yelk'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'widget_section_name',
            [
                'label' => esc_html__('Section Name', 'yelk'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Our Team', 'yelk'),
                'placeholder' => esc_html__('Type your title here', 'yelk'),
            ]
        );

        $this->add_control(
            'show_slider',
            [
                'label' => esc_html__( 'Slider', 'yelk' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__( 'Show', 'yelk' ),
                'label_off' => esc_html__( 'Hide', 'yelk' ),
                'return_value' => 'yes',
                "selectors" => [
                    "{{WRAPPER}} .our-team__container--flex" => "display: flex",
                ],
                'default' => 'no',
            ]
        );

        $this->add_responsive_control(
            "team_count",
            [
                "type" => Controls_Manager::SLIDER,
                "label" => esc_html__("Items Count", "smr"),
                "size_units" => ["fr"],
                "range" => [
                    "fr" => [
                        "min" => 1,
                        "max" => 4,
                        'step' => 1,
                    ]
                ],
                "devices" => ["desktop", "tablet", "mobile"],
                "desktop_default" => [
                    "size" => 4,
                    "unit" => "fr",
                ],
                "tablet_default" => [
                    "size" => 3,
                    "unit" => "fr",
                ],
                "mobile_default" => [
                    "size" => 1,
                    "unit" => "fr",
                ],
                "selectors" => [
                    "{{WRAPPER}} .our-team__container--grid" => "display: grid; grid-template-columns: repeat({{SIZE}}, 1fr)",
                ],
                "default" => [
                    "size" => 4,
                    "unit" => "fr",
                ],
            ]
        );

        $repeater = new Repeater();

        $repeater->add_control(
            'photo',
            [
                'label' => esc_html__('Choose Photo', 'yelk'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $repeater->add_control(
            "name",
            [
                "label" => esc_html__("Name", "yelk"),
                "type" => Controls_Manager::TEXT,
                "default" => esc_html__("Name", "yelk"),
                "label_block" => true,
            ]
        );

        $this->add_control(
            "team",
            [
                "label" => esc_html__("Team Members", "yelk"),
                "type" => Controls_Manager::REPEATER,
                "fields" => $repeater->get_controls(),
                "default" => [
                    [
                        "name" => esc_html__("Name", "yelk"),
                    ]
                ],
                "title_field" => "{{{ name }}}",
            ]
        );


        $this->end_controls_section();
    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();

        $params = array(
            'settings' => $settings,
        );

        $plugin_template_path = plugin_dir_path(__FILE__) . '/components/widgets/our-team/content.php';
        if (file_exists($plugin_template_path)) {
            $this->render_template($plugin_template_path, $params);
        }
    }

    protected function render_template($template_path, $params)
    {
        extract($params);
        require_once $template_path;
    }
}