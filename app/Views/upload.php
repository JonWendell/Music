<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Music Upload</title>
    <!-- Include Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #000;
            color: #FFD700; /* Gold text color */
        }

        .container {
            background-color: #000;
            color: #FFD700; /* Gold text color */
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
        }

        h2 {
            font-size: 24px;
            margin-top: 10px;
        }

        label {
            font-weight: bold;
        }

        .form-control {
            background-color: #333; /* Darker background color */
            color: #FFD700; /* Gold text color */
            border: 1px solid #444; /* Slightly lighter border color */
            margin-bottom: 10px;
        }

        .form-control:focus {
            background-color: #444; /* Darker background color on focus */
        }

        .btn-upload {
            background-color: #FFD700; /* Gold background color */
            color: #000; /* Black text color */
        }

        .btn-upload:hover {
            background-color: #444; /* Darker background color on hover */
            color: #FFD700; /* Gold text color on hover */
        }

        .btn-go-back {
            background-color: #FFD700; /* Gold background color */
            color: #000; /* Black text color */
        }

        .btn-go-back:hover {
            background-color: #444; /* Darker background color on hover */
            color: #FFD700; /* Gold text color on hover */
        }

    </style>
</head>

<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Music Upload</h1>

        <!-- Music Upload Form -->
        <div class="mb-4">
            <h2 class="text-center">Upload Music</h2>
            <form action="<?= site_url('music/upload') ?>" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="music_file" class="form-label">Select Music:</label>
                    <input type="file" name="music_file" class="form-control" accept=".mp3, .ogg" required>
                </div>
                <div class="mb-3">
                    <label for="playlist" class="form-label">Select Playlist:</label>
                    <select name="playlist" class="form-select">
                        <option value="none">Select a Playlist</option>
                        <?php if (isset($playlist)): ?>
                            <?php foreach ($playlist as $pl): ?>
                                <option value="<?= $pl['playlist_name'] ?>">
                                    <?= $pl['playlist_name'] ?>
                                </option>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </select>
                </div>
                <button type="submit" class="btn btn-upload">Upload</button>
            </form>
            <a class="btn btn-go-back" href="/music">Go Back</a>
        </div>
    </div>
    <!-- Include Bootstrap JS and jQuery (optional) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</body>

</html>
