<?php

declare(strict_types=1);

namespace Drupal\webprofiler\Debug;

/**
 * Formats debug file links.
 */
class FileLinkFormatter {

  /**
   * @var string[]
   */
  private array $fileLinkFormat;

  /**
   * FileLinkFormatter constructor.
   *
   * @param string $ide
   *   The IDE scheme.
   * @param string $ide_remote_path
   *   The remote path.
   * @param string $ide_local_path
   *   The local path.
   */
  public function __construct(
    string $ide,
    string $ide_remote_path,
    string $ide_local_path,
  ) {
    $this->fileLinkFormat = [
      $ide,
      $ide_remote_path,
      $ide_local_path,
    ];
  }

  /**
   * Format a file link.
   *
   * @return string
   *   The formatted file link.
   */
  public function format(string $file, int $line): string {
    $fmt = $this->fileLinkFormat;
    for ($i = 1; isset($fmt[$i]); ++$i) {
      if (str_starts_with($file, $k = $fmt[$i++])) {
        $file = substr_replace($file, $fmt[$i], 0, \strlen($k));
        break;
      }
    }

    return strtr($fmt[0], ['%f' => $file, '%l' => $line]);
  }

}
