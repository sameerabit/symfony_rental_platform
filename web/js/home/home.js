$(document).ready(function () {
    var categoryContent = [
        { category: 'Vehicles', title: 'Car',url:'/ads?categoryId=1' },
        { category: 'Vehicles', title: 'Van',url:'/ads?categoryId=2' },
        { category: 'Vehicles', title: 'Motorbikes',url:'/ads?categoryId=3' },
        { category: 'Vehicles', title: 'Push cycle',url:'/ads?categoryId=4' },
        { category: 'Vehicles', title: 'Wedding car',url:'/ads?categoryId=5' },
        { category: 'Vehicles', title: 'Lorry',url:'/ads?categoryId=6' },
        { category: 'Vehicles', title: 'Heavy Machinery',url:'/ads?categoryId=7' },
        { category: 'Vehicles', title: 'Boats And Water transport',url:'/ads?categoryId=8' },
        { category: 'Property', title: 'House',url:'/ads?categoryId=9' },
        { category: 'Property', title: 'Land',url:'/ads?categoryId=10' },
        { category: 'Property', title: 'Rooms & Annexes',url:'/ads?categoryId=11' },
        { category: 'Property', title: 'Apartments',url:'/ads?categoryId=12' },
        { category: 'Property', title: 'Commercial property',url:'/ads?categoryId=13' },
        { category: 'Machinery', title: 'Power tools',url:'/ads?categoryId=14' },
        { category: 'Machinery', title: 'Portable machines',url:'/ads?categoryId=15' },
        { category: 'Machinery', title: 'Equipments',url:'/ads?categoryId=16' },
        { category: 'Clothes/ Ornaments', title: 'Blazers & Coats',url:'/ads?categoryId=17' },
        { category: 'Clothes/ Ornaments', title: 'Bridal dress',url:'/ads?categoryId=18' },
        { category: 'Clothes/ Ornaments', title: 'Groom wear',url:'/ads?categoryId=19' },
        { category: 'Clothes/ Ornaments', title: 'Jewellery',url:'/ads?categoryId=20' },
        { category: 'Electronics', title: 'Sound systems',url:'/ads?categoryId=21' },
        { category: 'Electronics', title: 'Camera',url:'/ads?categoryId=22' },
        { category: 'Electronics', title: 'Laptops & Projectors',url:'/ads?categoryId=23' },
        { category: 'Electronics', title: 'Lighting equipments',url:'/ads?categoryId=24' },
        { category: 'Entertainment', title: 'Musical Instruments',url:'/ads?categoryId=25' },
        { category: 'Entertainment', title: 'DJ',url:'/ads?categoryId=26' },
        { category: 'Entertainment', title: 'Recording studios',url:'/ads?categoryId=27' },
        { category: 'Festival Items', title: 'Tents / Huts',url:'/ads?categoryId=28' },
        { category: 'Festival Items', title: 'Chairs',url:'/ads?categoryId=29' },
        { category: 'Festival Items', title: 'Buffet Set',url:'/ads?categoryId=30' },
        { category: 'Festival Items', title: 'Water Sink and Pumps',url:'/ads?categoryId=31' },
        { category: 'Festival Items', title: 'Pirith Mandappa',url:'/ads?categoryId=32' },
        { category: 'Sports', title: 'Sport equipments',url:'/ads?categoryId=33' },
        { category: 'Sports', title: 'Indoor/Outdoor stadiums',url:'/ads?categoryId=34' },
        { category: 'Construction Items', title: 'Construction Equipments',url:'/ads?categoryId=35' },
        { category: 'Construction Items', title: 'Construction Machinery',url:'/ads?categoryId=36' },
        { category: 'Travelling', title: 'Camping sites',url:'/ads?categoryId=37' },
        { category: 'Travelling', title: 'Bags',url:'/ads?categoryId=38' },
        { category: 'Travelling', title: 'Travelling Equipments',url:'/ads?categoryId=39' },
        { category: 'Other', title: 'Books',url:'/ads?categoryId=40' },
    ];

    $('.ui.search')
        .search({
            type: 'category',
            source: categoryContent
        })
    ;
})
