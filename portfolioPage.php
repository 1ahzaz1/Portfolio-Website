<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Portfolio</title>
  <link rel="stylesheet" href="reset.css">
  <link rel="stylesheet" href="styles.css">
  <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&display=swap" rel="stylesheet">
</head>

<body>
  <header>
  <?php include 'nav.php'; ?>
  </header>
  <main>
    <section class="portfolio">
      <h2>Python Program</h2>
      <h3>Fibonacci Sequence Generator</h3>
      <p>This program generates a Fibonacci sequence up to a specified number.</p>
      <pre>
        <code>
            def fibonacci_sequence(n):
                sequence = [0, 1]
                while sequence[-1] + sequence[-2] < n:
                    sequence.append(sequence[-1] + sequence[-2])
                return sequence

            n = 100
            fib_sequence = fibonacci_sequence(n)
            print(f"Fibonacci sequence up to {n}:")
            print(fib_sequence)
        </code>
      </pre>
    </section>
  </main>
</body>

</html>
