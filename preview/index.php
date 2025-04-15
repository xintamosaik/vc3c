<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="color-scheme" content="dark light" />
    <title>
        <?php echo $title; ?>
    </title>

    <style>
        body {
            font-family: "Helvetica", "Verdana", "Roboto", "Arial", sans-serif;
            margin: 0;
            font-size: 9pt;

        }

        main {
            padding-top: 1em;
            border-right: 1ch yellow solid;
            max-width: 210mm;
        }

        ul {
            padding-inline-start: 4ch;
        }

        p {
            margin-top: 6pt;
        }

        li,
        p {
            line-height: 1.7;
        }



        a:hover {
            text-decoration: underline;
        }

        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            margin-bottom: 0;
        }

        h1,
        h2,
        h3 {
            text-transform: uppercase;
        }

        h1 {
            margin-top: 30pt;
            font-size: 20pt;
        }

        h2 {
            margin-top: 30pt;
            font-size: 18pt;
        }

        h3 {
            margin-top: 15pt;
            font-size: 14pt;
        }

        h4 {
            font-weight: normal;
            font-style: italic;
            margin-top: 4pt;
            font-size: 11pt;
        }

        section#title,
        section#contact {
            display: flex;
            gap: 1ch;
        }

        .dash:before {
            content: "\00B7";
        }

        date-range {
            font-family: var(--font-sans), sans-serif;
            font-style: italic;
        }

        @media print {
            @page {
                size: A4;
            }

            main {
                margin-top: 5mm;
                margin-bottom: 5mm;
                margin-left: 10mm;
                margin-right: 10mm;
                border: none;
            }

            a {
                color: rgb(7, 43, 94);
                text-decoration: none;


            }

            nav {
                display: none;
            }


        }
    </style>
</head>

<body>
    <?php
    $title = "Ulf Dellbrügge - Software Engineer";



    $skills = [
        "Languages" => "TypeScript/Javascript, PHP, Golang, Java, CSS, HTML",
        "Frameworks" => "React, Tailwind, Next, Vite, Webpack",
        "Tools/Platforms" => "Git, Docker, Github (Actions), AWS",
        "Methodologies" => "Agile, Pair/Ensemble Programming, TDD/BDD"
    ];

    $summary_json = file_get_contents($_SERVER['DOCUMENT_ROOT'] . '/data/summary.json');
    $summary_data = json_decode($summary_json, true);
    $summary = $summary_data['summary'] ?? '';
    $position = $summary_data['position'] ?? '';

    $personal_json = file_get_contents($_SERVER['DOCUMENT_ROOT'] . '/data/personal.json');
    $personal_data = json_decode($personal_json, true);
    $full_name = $personal_data['name'] ?? '';
    $location = $personal_data['location'] ?? '';

    $contact_json = file_get_contents($_SERVER['DOCUMENT_ROOT'] . '/data/contact.json');
    $contact_data = json_decode($contact_json, true);
    $phone = $contact_data['phone'] ?? '';
    $address = $contact_data['address'] ?? '';
    $website = $contact_data['website'] ?? '';
    $github = $contact_data['github'] ?? '';
    $linkedin = $contact_data['linkedin'] ?? '';
    $email = $contact_data['email'] ?? '';
    ?>
    <nav>
        <a href="/">editor</a>
    </nav>

    <main>


        <div id="preview-content">
            <!-- This is where the content will be rendered -->
            <section id="title">
                <h1>
                    <span>
                        <strong><?php echo $full_name; ?></strong>
                    </span>
                    <span class="dash"></span>
                    <span>
                        <strong><?php echo $position; ?></strong>
                    </span>
                </h1>
            </section>

            <section id="contact">
                <span>
                    <a href="<?php echo $linkedin; ?>" target="_blank">
                        LinkedIn
                    </a>
                </span>
                <span class="dash"></span>
                <span>
                    <a href="mailto:<?php echo $email; ?>" target="_blank">
                        <?php echo $email; ?>
                    </a>
                </span>
                <span class="dash"></span>
                <span>
                    <a href="https://<?php echo $github ?>" target="_blank">
                        <?php echo $github; ?>
                    </a>
                </span>
                <span class="dash"></span>
                <span>
                    <?php echo $location; ?>
                </span>
            </section>

            <!-- SUMMARY-->

            <section id="summary">
                <h2>Summary</h2>
                <p>
                    <?php echo $summary; ?>
                </p>
            </section>

            <!-- EXPERIENCE-->

            <section id="experience">
                <h2>Experience</h2>

                <?php
                $job_files = glob($_SERVER['DOCUMENT_ROOT'] . '/data/jobs/*.json');
                foreach ($job_files as $file) {
                    $job_json = file_get_contents($file);
                    $job_data = json_decode($job_json, true);

                    $job_title = $job_data['position'] ?? '';
                    $company = $job_data['company'] ?? '';
                    $start_date = $job_data['start'] ?? '';
                    $end_date = $job_data['end'] ?? '';
                    $location = $job_data['location'] ?? '';
                    $description_data = $job_data['description'] ?? '';
                    $description_broken = nl2br(htmlspecialchars($description_data));
                    $description_array = explode("\n", $description_broken);

                    $description = '';
                    foreach ($description_array as $line) {
                        if (trim($line) === '') {
                            continue; // Skip empty lines
                        }
                        $description .= "<li>$line</li>";
                    }

                    echo <<<HTML
                <div class="job entry">
                    <h3>
                        <span>$job_title</span>
                        <span class="dash"></span>
                        <span>$company</span>
                    </h3>
                    <h4>
                        <span>$start_date - $end_date</span>
                        <span class="dash"></span>
                        <span>$location</span>
                    </h4>

                    <ul>
                        $description
                    </ul>
                </div>
            HTML;
                }
                ?>
            </section>

            <!-- SKILLS -->

            <section>
                <h2>Skills</h2>
                <ul>
                    <li>
                        <strong>Languages:</strong> TypeScript/Javascript, PHP, Golang, Java, CSS, HTML
                    </li>
                    <li>
                        <strong>Frameworks:</strong> React, Tailwind, Next, Vite, Webpack
                    </li>
                    <li>
                        <strong>Tools/Platforms:</strong> Git, Docker, Github (Actions), AWS
                    </li>
                    <li>
                        <strong>Methodologies:</strong> Agile, Pair/Ensemble Programming, TDD/BDD
                    </li>
                </ul>

            </section>

            <!-- EDUCATION -->

            <section>

                <h2>Education</h2>


                <?php
                $education_files = glob($_SERVER['DOCUMENT_ROOT'] . '/data/education/*.json');
                foreach ($education_files as $file) {
                    $education_json = file_get_contents($file);
                    $education_data = json_decode($education_json, true);

                    $degree = $education_data['degree'] ?? '';
                    $institution = $education_data['institution'] ?? '';
                    $start_date = $education_data['start'] ?? '';
                    $end_date = $education_data['end'] ?? '';
                    $location = $education_data['location'] ?? '';
                    $description = $education_data['description'] ?? '';

                    echo <<<HTML
                <div class="education entry">
                    <h3>
                        <span>$degree</span>
                        <span class="dash"></span>
                        <span>$institution</span>
                    </h3>
                    <h4>
                        <span>$start_date - $end_date</span>
                        <span class="dash"></span>
                        <span>$location</span>
                    </h4>
                    <p>$description</p>

                </div>
            HTML;
                }
                ?>


            </section>
        </div>
    </main>
    <?php
    include $_SERVER['DOCUMENT_ROOT'] . "/html/end.php";

    ?>