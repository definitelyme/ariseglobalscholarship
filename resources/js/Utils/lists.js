const kLists = {
    years: (start, end) => {
        if (typeof start !== "number") start = 1990;
        if (typeof start !== "number" || end == null)
            end = new Date().getFullYear();
        let currentYear = end,
            years = [];
        start = start || 1980;
        while (start <= currentYear) {
            years.push(start++);
        }
        return years;
    },

    months: [
        "January",
        "February",
        "March",
        "April",
        "May",
        "June",
        "July",
        "August",
        "September",
        "October",
        "November",
        "December",
    ],

    classes: [
        "Not Specified",
        "JSS 1",
        "JSS 2",
        "JSS 3",
        "SSS 1",
        "SSS 2",
        "SSS 3",
        "Graduated",
    ],

    levels: [
        "100 Level",
        "200 Level",
        "300 Level",
        "400 Level",
        "500 Level",
        "600 Level",
        "700 Level",
        "ND 1",
        "ND 2",
        "HND 2",
        "HND 2",
        "Graduated",
    ],

    course_duration: [
        "2 years",
        "3 years",
        "4 years",
        "5 years",
        "6 years",
        "7 years",
        "8 years",
    ],

    courses: [
        "Agric Extension Services",
        "Agricultural Economics",
        "Agricultural Engineering",
        "Animal Science And Technology",
        "Architecture",
        "Biochemistry",
        "Biological Science",
        "Biology",
        "Biomedical Technology",
        "Biotechnology",
        "Chemical Engineering",
        "Chemistry",
        "Civil Engineering",
        "Computer Science",
        "Crop Science",
        "Dental",
        "Dental Technology",
        "Electrical /Electronics Engineering",
        "Environmental Technology",
        "Financial Management Technology",
        "Fisheries And Aquaculture Technology",
        "Food Science And Technology",
        "Forestry And Wildlife Technology/Management",
        "Geology",
        "Industrial Chemistry",
        "Industrial Microbiology",
        "Information Management Technology",
        "Maritime Managemnt Technology",
        "Mathematics",
        "Mechanical Engineering",
        "Mechatronics Engineering Technology",
        "Metallurgical And Materials Engineering",
        "Optometry",
        "Petroleum Engineering",
        "Physics",
        "Polymer And Textile Engineering",
        "Project Management Technology",
        "Prosthesis And Orthopaedic Technology",
        "Public Health Technology",
        "Quantity Surveying",
        "Quantity Surveying",
        "Science Laboratory Technology",
        "Soil Science And Technology",
        "Statistics",
        "Structural Engineering",
        "Surveying And Geoinformatics",
        "Transport Management Technology",
        "Urban and Regional Planning",
    ],
};

export default kLists;
