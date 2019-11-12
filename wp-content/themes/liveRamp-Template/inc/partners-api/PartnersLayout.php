<?php
//require 'PartnersLayout.php';

class PartnersLayout {

    public $partners_data;
    public  $partners;

    function __construct(){
        $this->partners_data = new PartnersData();
        $this->partners = $this->partners_data->partners();
    }

     function dropdown_select_menu(){ ?>
            <div class="select-ctn">
                <label for="partner-categories">Category:</label>
                <select class="menu-sort iso-filter-partners">
                    <option value="*">All</option>
                    <?php
                        $categories = $this->partners_data->categories();
                            foreach ( $categories as  $category_array ):
                                foreach($category_array as $category_key => $category):
                                     echo '<option value=".filter-' .$category_key. '">' . $category . '</option>';
                                endforeach;
                            endforeach;
                    ?>
                </select>
            </div>
     <?php  }

    function partner_categories() {
        return $this->partners_data->categories();
    }


    function partners_section(){
        ?>
        <section class="iso-partners" id="iso-partners">
        <?php
        foreach($this->partners as $partner){

            // TEMP HACKY FIX.
	        if($partner->name === 'a-bangpixels-interactive') {
	            $partner->name = 'abangpixels-interactive';
            }

	        // echo nl2br(print_r($partner,true));
        ?>
        <?php
            // Get extra filter classes
            $filter_classes = '';
            // Categories
            if ($partner->categories) {
                foreach ($partner->categories as $category) {
                    $filter_classes .= 'filter-category-' . strtolower(preg_replace('/[^a-z0-9]+/i','-',$category)) . ' ';
                }
            }

            // region
            if ($partner->availabilities) {
                foreach ($partner->availabilities as $region) {
                    $filter_classes .= 'filter-region-' . strtolower(preg_replace('/[^a-z0-9]+/i','-',$region)) . ' ';
                }
            }

            // certifications
            if ($partner->certifications) {
                foreach ($partner->certifications as $certification) {
                    $filter_classes .= 'filter-certification-' . strtolower(preg_replace('/[^a-z0-9]+/i','-',$certification)) . ' ';
                }
            }

            // level
            if ($partner->level) {
                $filter_classes .= 'filter-level-' . strtolower(preg_replace('/[^a-z0-9]+/i','-',$partner->level)) . ' ';
            } else {
                $filter_classes .= 'filter-level-none ';
            }

            // use cases
            if ($partner->use_cases) {
                foreach ($partner->use_cases as $use_case) {
                    $filter_classes .= 'filter-use_case-' . strtolower(preg_replace('/[^a-z0-9]+/i','-',$use_case)) . ' ';
                }
            }
            $levelSort = '5';
            switch($partner->level) {
                case 'platinum':
                    $levelSort = '1';
                    break;
                case 'gold':
                    $levelSort = '2';
                    break;
                case 'silver':
                    $levelSort = '3';
                    break;
                case 'bronze':
                    $levelSort = '4';
                    break;
                default:
                    $levelSort = '5';
                    break;
            }
        ?>

        <div id="<?php echo 'partner-'.$partner->id; ?>" class="partners-item <?php echo $partner->category_classes . ' ' . $partner->title_class .' '. $partner->level .' '.$filter_classes; ?>" data-partner="<?php echo $partner->title_class; ?>" data-level-sort="<?php echo $levelSort; ?>">
            <div class="level">

            </div>
            <a href="/partner/<?php echo InsertPartnersPages::clean_title_for_url($partner->name); ?>">
                <img  src="<?php echo  $partner->logo_url_in_liveramp_server; ?>" class="attachment-post-thumbnail wp-post-image" alt="<?php echo $partner->name; ?>">
                </a>
            </div>
        <?php
        } ?>
        </section>
        <?php
    }

}
