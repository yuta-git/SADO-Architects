<?php
get_header();

$selected_area      = isset( $_GET['area'] ) ? sanitize_title( wp_unslash( $_GET['area'] ) ) : '';
$selected_year      = isset( $_GET['year'] ) ? sanitize_title( wp_unslash( $_GET['year'] ) ) : '';
$selected_structure = isset( $_GET['structure'] ) ? sanitize_title( wp_unslash( $_GET['structure'] ) ) : '';
$selected_scales    = isset( $_GET['scale'] ) ? (array) wp_unslash( $_GET['scale'] ) : array();
$selected_scales    = array_values( array_filter( array_map( 'sanitize_title', $selected_scales ) ) );

$area_terms = get_terms(
  array(
    'taxonomy'   => 'projects_area',
    'hide_empty' => false,
  )
);
$year_terms = get_terms(
  array(
    'taxonomy'   => 'projects_year',
    'hide_empty' => false,
  )
);
$structure_terms = get_terms(
  array(
    'taxonomy'   => 'projects_structure',
    'hide_empty' => false,
  )
);
$scale_terms = get_terms(
  array(
    'taxonomy'   => 'projects_scale',
    'hide_empty' => false,
  )
);
?>

<main class="l-main">
  <section class="p-works-page">
    <div class="p-works-page__inner l-container">
      <h1 class="p-works-page__heading">WORKS</h1>

      <!-- Filter -->
      <form class="p-works-page__filter" method="get" action="<?php echo esc_url( get_post_type_archive_link( 'works' ) ); ?>">
        <!-- SP: 検索トグルボタン -->
        <button type="button" class="p-works-page__filter-toggle js-filter-toggle" aria-expanded="false" aria-controls="works-filter-body">
          SEARCH
        </button>

        <div class="p-works-page__filter-body js-filter-body" id="works-filter-body">
          <div class="p-works-page__filter-selects">
            <div class="p-works-page__filter-group">
              <label class="p-works-page__filter-label" for="filter-area">地域</label>
              <div class="p-works-page__select-wrap">
                <select class="p-works-page__select" id="filter-area" name="area">
                  <option value="">選択してください</option>
                  <?php if ( ! is_wp_error( $area_terms ) ) : ?>
                    <?php foreach ( $area_terms as $area_term ) : ?>
                      <option value="<?php echo esc_attr( $area_term->slug ); ?>" <?php selected( $selected_area, $area_term->slug ); ?>>
                        <?php echo esc_html( $area_term->name ); ?>
                      </option>
                    <?php endforeach; ?>
                  <?php endif; ?>
                </select>
              </div>
            </div>
            <div class="p-works-page__filter-group">
              <label class="p-works-page__filter-label" for="filter-year">築工年</label>
              <div class="p-works-page__select-wrap">
                <select class="p-works-page__select" id="filter-year" name="year">
                  <option value="">選択してください</option>
                  <?php if ( ! is_wp_error( $year_terms ) ) : ?>
                    <?php foreach ( $year_terms as $year_term ) : ?>
                      <option value="<?php echo esc_attr( $year_term->slug ); ?>" <?php selected( $selected_year, $year_term->slug ); ?>>
                        <?php echo esc_html( $year_term->name ); ?>
                      </option>
                    <?php endforeach; ?>
                  <?php endif; ?>
                </select>
              </div>
            </div>
            <div class="p-works-page__filter-group">
              <label class="p-works-page__filter-label" for="filter-structure">構造</label>
              <div class="p-works-page__select-wrap">
                <select class="p-works-page__select" id="filter-structure" name="structure">
                  <option value="">選択してください</option>
                  <?php if ( ! is_wp_error( $structure_terms ) ) : ?>
                    <?php foreach ( $structure_terms as $structure_term ) : ?>
                      <option value="<?php echo esc_attr( $structure_term->slug ); ?>" <?php selected( $selected_structure, $structure_term->slug ); ?>>
                        <?php echo esc_html( $structure_term->name ); ?>
                      </option>
                    <?php endforeach; ?>
                  <?php endif; ?>
                </select>
              </div>
            </div>
          </div>

          <div class="p-works-page__filter-bottom">
            <div class="p-works-page__filter-scale">
              <span class="p-works-page__filter-label">規模</span>
              <div class="p-works-page__filter-checkbox-row">
                <?php if ( ! is_wp_error( $scale_terms ) ) : ?>
                  <?php foreach ( $scale_terms as $scale_term ) : ?>
                    <label class="p-works-page__checkbox-label">
                      <input
                        class="p-works-page__checkbox"
                        type="checkbox"
                        name="scale[]"
                        value="<?php echo esc_attr( $scale_term->slug ); ?>"
                        <?php checked( in_array( $scale_term->slug, $selected_scales, true ) ); ?>
                      />
                      <span class="p-works-page__checkbox-text"><?php echo esc_html( $scale_term->name ); ?></span>
                    </label>
                  <?php endforeach; ?>
                <?php endif; ?>
              </div>
            </div>
            <button type="submit" class="p-works-page__search-btn">SEARCH</button>
          </div>
        </div><!-- /.p-works-page__filter-body -->
      </form>

      <!-- Works list -->
      <ul class="p-works-page__list">
        <?php
        $tax_query = array( 'relation' => 'AND' );

        if ( '' !== $selected_area ) {
          $tax_query[] = array(
            'taxonomy' => 'projects_area',
            'field'    => 'slug',
            'terms'    => $selected_area,
          );
        }
        if ( '' !== $selected_year ) {
          $tax_query[] = array(
            'taxonomy' => 'projects_year',
            'field'    => 'slug',
            'terms'    => $selected_year,
          );
        }
        if ( '' !== $selected_structure ) {
          $tax_query[] = array(
            'taxonomy' => 'projects_structure',
            'field'    => 'slug',
            'terms'    => $selected_structure,
          );
        }
        if ( ! empty( $selected_scales ) ) {
          $tax_query[] = array(
            'taxonomy' => 'projects_scale',
            'field'    => 'slug',
            'terms'    => $selected_scales,
            'operator' => 'IN',
          );
        }

        $args = array(
          'post_type'      => 'works',
          'posts_per_page' => 10,
          'paged'          => max( 1, get_query_var( 'paged' ) ),
        );
        if ( count( $tax_query ) > 1 ) {
          $args['tax_query'] = $tax_query;
        }
        $works = new WP_Query($args);
        if ($works->have_posts()) :
          while ($works->have_posts()) :
            $works->the_post();
        ?>
            <li class="p-works-page__item">
              <a href="<?php the_permalink(); ?>" class="p-works-page__link">
                <figure class="p-works-page__image">
                  <?php
                  if (has_post_thumbnail()) :
                    the_post_thumbnail('post-thumbnail');
                  else :
                    echo '<img src="' . get_template_directory_uri() . '/img/works/work01.jpg" alt="古民家再生" width="500" height="380" loading="lazy" />';
                  endif;
                  ?>
                </figure>
                <div class="p-works-page__body">
                  <p class="p-works-page__category">
                    <?php
                    $terms = get_the_terms( get_the_ID(), 'workscat' );
                    if ( $terms && ! is_wp_error( $terms ) ) {
                      foreach ( $terms as $term ) {
                        echo esc_html( $term->name );
                      }
                    }
                    ?>
                  </p>
                  <p class="p-works-page__text"><?php the_title(); ?></p>
                  <time datetime="20XX-XX-XX" class="p-works-page__date"><?php the_time('Y.m.d'); ?></time>
                </div>
              </a>
            </li>
        <?php endwhile;
        endif;
        wp_reset_postdata();
        ?>
      </ul>

    </div>
  </section>
</main>

<?php get_footer(); ?>