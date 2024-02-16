<?php declare(strict_types=1);
/**
 * (c) 2005-2024 Dmitry Lebedev <dl@adios.ru>
 * This source code is part of the Ultra package library.
 * Please see the LICENSE file for copyright and licensing information.
 */
namespace Ultra\Enum\Dominant;

/**
 * Реализация методов интерфейса Ultra\Enum\Dominant\Api\Unit
 * Метод setMainByName() использует метод getCaseByName() из трейта
 * Ultra\Enum\Cases.
 */
trait Unit {
	use \Ultra\Enum\Cases;

	public static function getDefaultCase(): self|null {
		return self::getCaseById(0);
	}
	
	final public static function main(): self|null {
		return self::_main();
	}

	final public static function setMainByName(string $name): self|null {
		return self::_main(self::getCaseByName($name));
	}

	final public static function getMainName(): string|null {
		return self::_main()?->name;
	}

	final public function isMain(): bool {
		return self::_main() === $this;
	}

    final public function setMain(): self {
        return self::_main($this);
    }

	public static function __callStatic(string $name, array $args): self|null {
		if (!$case = self::getCaseByName($name)) {
			return null;
		}

		if (!$main = self::_main()) {
			return null;
		}

		if ($case == $main) {
			return $case;
		}

		if (!isset($args[0])) {
			return null;
		}

		if ($args[0]) {
			self::_main($case);
		}

		if (isset($args[1]) && $args[1]) {
			return $main;
		}

		return $case;
	}

	private static function _main(self|null $case = null): self|null {
		static $_main = null;
		
		if (null == $case) {
			return $_main ?? self::getDefaultCase();
		}
		
		$previous = $_main ?? self::getDefaultCase();
		$_main  = $case;
		return $previous;
	}
}
