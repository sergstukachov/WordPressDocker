<?php
/**
 * Retrieving the values:
 * Choose a brand = get_post_meta( get_the_ID(), 'brand_choose-a-brand', true )
 */
class Brand {
    private $config = '{"title":"Brand",
    "description":"Brand",
    "prefix":"brand_",
    "domain":"brand",
    "class_name":"Brand",
    "post-type":["post"],
    "context":"normal",
    "priority":"default",
    "cpt":"test_cars",
    "fields":[{"type":"text",
    "label":"Choose a brand",
    "id":"brand"}]}';

    public function __construct() {
        $this->config = json_decode( $this->config, true );
        $this->process_cpts();
        add_action( 'add_meta_boxes', [ $this, 'add_meta_boxes' ] );
        add_action( 'admin_head', [ $this, 'admin_head' ] );
        add_action( 'save_post', [ $this, 'save_post' ] );
    }

    public function process_cpts() {
        if ( !empty( $this->config['cpt'] ) ) {
            if ( empty( $this->config['post-type'] ) ) {
                $this->config['post-type'] = [];
            }
            $parts = explode( ',', $this->config['cpt'] );
            $parts = array_map( 'trim', $parts );
            $this->config['post-type'] = array_merge( $this->config['post-type'], $parts );
        }
    }

    public function add_meta_boxes() {
        foreach ( $this->config['post-type'] as $screen ) {
            add_meta_box(
                sanitize_title( $this->config['title'] ),
                $this->config['title'],
                [ $this, 'add_meta_box_callback' ],
                $screen,
                $this->config['context'],
                $this->config['priority']
            );
        }
    }

    public function admin_head() {
        global $typenow;
        if ( in_array( $typenow, $this->config['post-type'] ) ) {
            ?><?php
        }
    }

    public function save_post( $post_id ) {
        foreach ( $this->config['fields'] as $field ) {
            switch ( $field['type'] ) {
                default:
                    if ( isset( $_POST[ $field['id'] ] ) ) {
                        $sanitized = sanitize_text_field( $_POST[ $field['id'] ] );
                        update_post_meta( $post_id, $field['id'], $sanitized );
                    }
            }
        }
    }

    public function add_meta_box_callback() {
        echo '<div class="rwp-description">' . $this->config['description'] . '</div>';
        $this->fields_table();
    }

    private function fields_table() {
        ?><table class="form-table" role="presentation">
        <tbody><?php
        foreach ( $this->config['fields'] as $field ) {
            ?><tr>
            <th scope="row"><?php $this->label( $field ); ?></th>
            <td><?php $this->field( $field ); ?></td>
            </tr><?php
        }
        ?></tbody>
        </table><?php
    }

    private function label( $field ) {
        switch ( $field['type'] ) {
            default:
                printf(
                    '<label class="" for="%s">%s</label>',
                    $field['id'], $field['label']
                );
        }
    }

    private function field( $field ) {
        switch ( $field['type'] ) {
            default:
                $this->input( $field );
        }
    }

    private function input( $field ) {
        printf(
            '<input class="regular-text %s" id="%s" name="%s" %s type="%s" value="%s">',
            isset( $field['class'] ) ? $field['class'] : '',
            $field['id'], $field['id'],
            isset( $field['pattern'] ) ? "pattern='{$field['pattern']}'" : '',
            $field['type'],
            $this->value( $field )
        );
    }

    private function value( $field ) {
        global $post;
        if ( metadata_exists( 'post', $post->ID, $field['id'] ) ) {
            $value = get_post_meta( $post->ID, $field['id'], true );
        } else if ( isset( $field['default'] ) ) {
            $value = $field['default'];
        } else {
            return '';
        }
        return str_replace( '\u0027', "'", $value );
    }

}
new Brand;