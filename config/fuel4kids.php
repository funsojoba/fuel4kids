<?php

return [

    'org_name' => 'Fuel4Kids Organization',
    'tagline' => 'Nourish the child. Strengthen the village.',
    'email' => env('ORG_EMAIL', 'admin01@fuel4kidsca.org'),
    'phones' => ['365-887-4665', '647-389-8993'],
    'address' => 'Richmond Hill, York Region, Ontario, Canada',
    'registration' => 'Canada Not-for-profit Corporations Act - 1758155-6',
    'facebook' => 'https://web.facebook.com/Fuel4kidsorg',
    'instagram' => 'https://web.facebook.com/Fuel4kidsorg',

    // Preset donation amounts in CAD dollars.
    'donation_amounts' => [25, 50, 100, 250],

    'team' => [
        [
            'name' => 'Joan Monzac',
            'role' => 'Executive Director',
            'photo' => 'images/team/joan-monzac.png',
            'summary' => 'Provides overall leadership, vision, and governance for the Fuel 4 Kids Organization, ensuring that all programs, including the school lunch and care support initiatives, fulfill their mission of nourishing bodies, strengthening families, and building brighter futures.',
            'responsibilities' => [
                'Lead, plan, and oversee all operations, programs, and partnerships.',
                'Represent the organization to ministries, school boards, donors, and the community.',
                'Develop strategic plans, goals, and measurable outcomes for growth and impact.',
                'Supervise directors and managers to ensure efficiency and accountability.',
                'Oversee finances, fundraising, and compliance with nonprofit and CRA standards.',
                'Foster community engagement and advocate for child well-being and food security.',
                'Report regularly to the Board of Directors and ensure transparency in all operations.',
            ],
        ],
        [
            'name' => 'Arthur Awele Onwuegbuzie',
            'role' => 'Director of Operations and Logistics',
            'photo' => 'images/team/arthur-onwuegbuzie.png',
            'summary' => 'Leads the operational backbone of Fuel 4 Kids, making sure food and supplies reach children and families safely, efficiently, and on time.',
            'responsibilities' => [
                'Plan and manage procurement, storage, and distribution of food and supplies.',
                'Maintain partnerships with local vendors, farms, and donors.',
                'Ensure safe and efficient transportation and food handling procedures.',
                'Supervise logistics and volunteer teams during preparation and delivery.',
                'Coordinate with nutrition and care package departments to align schedules.',
                'Monitor costs, inventory, and logistics efficiency.',
                'Provide monthly reports to the Executive Director on operations performance.',
            ],
        ],
        [
            'name' => 'Ryhana Wong-Jeffers',
            'role' => 'Manager of Food and Nutrition Programs',
            'photo' => 'images/team/ryhana-wong-jeffers.png',
            'summary' => 'Oversees the planning, preparation, and nutritional quality of all meals under the Fuel 4 Kids Organization school nutrition program, ensuring compliance with food safety and public health standards.',
            'responsibilities' => [
                'Develop and maintain nutritious, culturally inclusive meal plans.',
                'Collaborate with the Executive Director to incorporate culinary best practices and innovation.',
                'Ensure food handling aligns with York Region Public Health regulations.',
                'Oversee preparation, packaging, and delivery coordination for all meals.',
                'Work with the Director of Operations on ingredient sourcing and inventory control.',
                'Train and supervise volunteers and staff involved in meal preparation.',
                'Implement allergy, dietary, and food safety protocols.',
                'Conduct nutrition education workshops for schools, families, and volunteers.',
            ],
        ],
        [
            'name' => 'Lenore Mogent',
            'role' => 'Manager of Family & Care Package Programs',
            'photo' => 'images/team/lenore-mogent.png',
            'summary' => 'Oversees the design, assembly, and delivery of care packages to children and families, ensuring dignity, cultural sensitivity, and essential support beyond school meals.',
            'responsibilities' => [
                'Manage sourcing and distribution of hygiene and wellness items.',
                'Coordinate packaging teams and maintain inventory records.',
                'Ensure the quality and consistency of care packages distributed weekly.',
                'Collaborate with Operations and Nutrition teams for logistics coordination.',
                'Build partnerships with suppliers, community agencies, and donors.',
                'Track impact data and produce reports on family engagement outcomes.',
                'Develop outreach programs to strengthen family support and community ties.',
            ],
        ],
        [
            'name' => 'Carole Robinson',
            'role' => 'Regional Director, Hamilton Region',
            'photo' => 'images/team/carole-robinson.png',
            'summary' => 'Provides regional leadership for Fuel 4 Kids Organization operations in the Hamilton area, ensuring that programs are responsive to local needs and aligned with the organization\'s mission and standards.',
            'responsibilities' => [
                'Oversee implementation of Fuel 4 Kids Organization programs within Hamilton-area schools and community sites.',
                'Serve as primary liaison with Hamilton-area school boards, principals, and community partners.',
                'Identify local needs, service gaps, and collaboration opportunities to strengthen impact.',
                'Coordinate local volunteers and staff involved in meal and care package delivery.',
                'Support outreach to families, community agencies, and donors in the Hamilton region.',
                'Monitor program quality, participation, and outcomes at the regional level.',
                'Provide regular regional reports and recommendations to the Executive Director.',
            ],
        ],
    ],

    'ambassadors' => [
        [
            'name' => 'Verna Grante',
            'role' => 'International Program Representative & Program Coordinator — St. Kitts and Nevis',
            'photo' => 'images/team/verna-grante.png',
            'summary' => 'Provides strategic leadership and coordination for Fuel4Kids Organization\'s programs and partnerships in St. Kitts and Nevis, ensuring that all initiatives are effectively implemented, responsive to community needs, and aligned with the organization\'s mission, values, and operational standards.',
            'responsibilities' => [
                'Serves as the organization\'s primary representative within the Federation while strengthening collaboration with government ministries, schools, and community stakeholders.',
                'Oversee the implementation and coordination of Fuel4Kids programs, outreach initiatives, and humanitarian projects throughout St. Kitts and Nevis.',
                'Serve as the primary liaison with government ministries, schools, community organizations, healthcare providers, and strategic partners.',
                'Identify community needs, service gaps, and partnership opportunities to expand Fuel4Kids\' impact and sustainability.',
            ],
        ],
        [
            'name' => 'Sybil Newton-Bryant',
            'role' => 'International Program Representative & Program Coordinator — Justice of the Peace & Community Relations Coordinator, Jamaica',
            'photo' => 'images/team/sybil-newton-bryant.png',
            'summary' => 'Provides strategic leadership, community engagement, and program coordination for Fuel4Kids Organization\'s initiatives throughout Jamaica, bringing trusted community leadership, professionalism, and integrity to the organization while strengthening partnerships that advance Fuel4Kids\' mission.',
            'responsibilities' => [
                'Serves as the organization\'s primary representative in Jamaica, fostering collaboration with government ministries, schools, healthcare providers, community organizations, faith-based institutions, and corporate partners.',
                'Oversee the implementation and coordination of Fuel4Kids programs, outreach initiatives, and humanitarian projects throughout Jamaica.',
                'Serve as the primary liaison with government ministries, schools, community organizations, healthcare providers, faith-based institutions, and strategic partners across Jamaica.',
                'Utilize her role as a Justice of the Peace to promote ethical leadership, public trust, community engagement, and positive relationships.',
            ],
        ],
    ],

];
