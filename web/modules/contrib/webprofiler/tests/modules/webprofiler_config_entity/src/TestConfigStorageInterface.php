<?php

namespace Drupal\webprofiler_config_entity;

use Drupal\node\Entity\Node;

/**
 * Defines the testconfig storage.
 */
interface TestConfigStorageInterface {

  public function method0();

  public function method1(): void;

  public function method2($param1): int;

  public function method3(string $param1): string;

  public function method4(string $param1, string $param2): string|null;

  public function method5(string $param1 = NULL): ?string;

  public function method6(bool $param1 = FALSE): mixed;

  public function method7(bool $param1 = TRUE): void;

  public function method8(array $param1 = []): void;

  public function method9(int $param1 = 5): void;

  public function method10(string $param1): void;

  public function method11(?array $param1 = NULL): array;

  public function method12(string ...$param1): float;

  public function method13(string &$param1): bool;

  public function method14(Node $param1): bool;

  public function method15(Node $param1): Node;
}
