<?php
/**
 * Configuration and Global Data
 * Cindy Shi - Independent Realtor | Toronto & Entire GTA
 */

define('SITE_NAME', 'Cindy Shi | Toronto & GTA Real Estate Specialist');
define('REALTOR_NAME', 'Cindy Shi');
define('REALTOR_TITLE', 'Licensed Independent Realtor & Real Estate Advisor');
define('REALTOR_EXPERIENCE', '10+ Years Helping Buyers, Sellers & Renters Across the GTA');
define('CONTACT_EMAIL', 'cindy@cindyshi.ca');
define('CONTACT_PHONE', '+1 (647) 554-2070');
define('OFFICE_LOCATION', 'Toronto & Servicing All Greater Toronto Area (GTA)');

// Diverse GTA Listings Across Budgets (Condos, Family Homes, Townhouses, Rentals, Luxury)
$featured_listings = [
    [
        'id' => 'cs-condo',
        'title' => 'Downtown Toronto Sunlit Condo',
        'tag' => 'Great for First-Time Buyer or Investor',
        'status' => 'For Sale',
        'price' => '$689,000',
        'raw_price' => 689000,
        'location' => 'Downtown Toronto (Financial & Entertainment Dist.)',
        'area' => 'Downtown Toronto',
        'type' => 'Condo / Apartment',
        'category' => 'condo',
        'beds' => '1 + Den',
        'baths' => 1,
        'sqft' => '680 sq.ft.',
        'image' => 'images/prop-condo.jpg',
        'description' => 'Bright, open-concept floor plan with floor-to-ceiling windows, modern kitchen island, dedicated work-from-home den space, low maintenance fees, and steps to the subway.'
    ],
    [
        'id' => 'cs-family',
        'title' => 'Markham Modern Detached Family Home',
        'tag' => 'Prime Family Neighborhood',
        'status' => 'For Sale',
        'price' => '$1,650,000',
        'raw_price' => 1650000,
        'location' => 'Berczy / Unionville, Markham',
        'area' => 'York Region',
        'type' => 'Detached Family Home',
        'category' => 'family',
        'beds' => 4,
        'baths' => 4,
        'sqft' => '2,850 sq.ft.',
        'image' => 'images/prop-markham.jpg',
        'description' => 'Renovated contemporary 2-storey detached residence in a top-rated Ontario school zone. Open chef kitchen, 2-car garage, private landscaped backyard, and bright finished basement.'
    ],
    [
        'id' => 'cs-rent',
        'title' => 'Yorkville Executive City Suite',
        'tag' => 'Available for Lease / Rent',
        'status' => 'For Rent',
        'price' => '$3,400 / mo',
        'raw_price' => 3400,
        'location' => 'Yorkville, Toronto',
        'area' => 'Downtown Toronto',
        'type' => 'Executive Rental',
        'category' => 'rental',
        'beds' => 2,
        'baths' => 2,
        'sqft' => '920 sq.ft.',
        'image' => 'images/prop-yorkville.jpg',
        'description' => 'Designer furnished executive rental suite with premium built-in appliances, private balcony, locker, parking, 24-hr concierge, gym, and rooftop lounge. Ideal for professionals and relocations.'
    ],
    [
        'id' => 'cs-bridle',
        'title' => 'The Bridle Path Manor',
        'tag' => 'Signature Luxury Estate',
        'status' => 'For Sale',
        'price' => '$14,880,000',
        'raw_price' => 14880000,
        'location' => 'The Bridle Path, Toronto',
        'area' => 'Toronto Central',
        'type' => 'Estate / Mansion',
        'category' => 'luxury',
        'beds' => 6,
        'baths' => 9,
        'sqft' => '11,400 sq.ft.',
        'image' => 'images/prop-bridle-path.jpg',
        'description' => 'Architectural masterpiece crafted with imported limestone, grand circular fountain motor court, private resort rear grounds, bespoke wine cellar, and indoor spa pavilion.'
    ],
    [
        'id' => 'cs-oakville',
        'title' => 'Oakville Lakeshore Villa',
        'tag' => 'Waterfront Living',
        'status' => 'For Sale',
        'price' => '$11,200,000',
        'raw_price' => 11200000,
        'location' => 'Old Oakville, Halton Region',
        'area' => 'Oakville / Halton',
        'type' => 'Waterfront Estate',
        'category' => 'luxury',
        'beds' => 5,
        'baths' => 7,
        'sqft' => '8,900 sq.ft.',
        'image' => 'images/prop-oakville.jpg',
        'description' => 'Direct riparian waterfront access with private deep-water boat dock, infinity swimming pool, heated waterside loggia, and floor-to-ceiling glass capturing sunrise reflections.'
    ],
    [
        'id' => 'cs-forest-hill',
        'title' => 'Forest Hill Heritage Home',
        'tag' => 'Classic Prestigious Neighborhood',
        'status' => 'Just Listed',
        'price' => '$8,850,000',
        'raw_price' => 8850000,
        'location' => 'Forest Hill, Toronto',
        'area' => 'Toronto Central',
        'type' => 'Estate / Custom Home',
        'category' => 'luxury',
        'beds' => 5,
        'baths' => 6,
        'sqft' => '7,200 sq.ft.',
        'image' => 'images/prop-forest-hill.jpg',
        'description' => 'Harmonious marriage of classic English Tudor majesty and state-of-the-art modern engineering. Magnificent stone archways, cobblestone court, and steps from top schools.'
    ]
];

// Key stats
$stats = [
    ['number' => '10+', 'label' => 'Years GTA Experience'],
    ['number' => '500+', 'label' => 'Families & Clients Served'],
    ['number' => 'All GTA', 'label' => 'Toronto, York, Peel, Halton, Durham'],
    ['number' => '99.4%', 'label' => 'Client Satisfaction Rate']
];

// GTA Neighborhoods serviced
$neighborhoods = [
    ['name' => 'Downtown Toronto & Yorkville', 'region' => 'Toronto Core', 'type' => 'Condos, Penthouses & Historic Homes'],
    ['name' => 'North York, Midtown & Bridle Path', 'region' => 'Central Toronto', 'type' => 'Family Homes, Mansions & Townhouses'],
    ['name' => 'Markham & Richmond Hill', 'region' => 'York Region', 'type' => 'Top School Districts & Modern Detached Homes'],
    ['name' => 'Mississauga & Brampton', 'region' => 'Peel Region', 'type' => 'Convenient Family Suburbs, Condos & Riverfront'],
    ['name' => 'Oakville & Burlington', 'region' => 'Halton Region', 'type' => 'Lakeside Communities, Charming Towns & Estates'],
    ['name' => 'Pickering, Ajax & Whitby', 'region' => 'Durham Region', 'type' => 'Great Value, Growing Neighborhoods & Freeholds']
];
