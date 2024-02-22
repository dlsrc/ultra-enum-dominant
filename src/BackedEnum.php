<?php declare(strict_types=1);
/**
 * (c) 2005-2024 Dmitry Lebedev <dl@adios.ru>
 * This source code is part of the Ultra library.
 * Please see the LICENSE file for copyright and licensing information.
 */
namespace Ultra\Dominant;

/**
 * Методы расширяющие возможности интерфейса Ultra\Enum\Dominant\Unit,
 * добавляют дополнительную функциональность в типизированные перечисления.
 */
interface BackedEnum extends UnitEnum, \BackedEnum {
	/**
	 * Получить скалярное значение основного варианта типизированного перечисления.
	 * Вернёт целое или строковое значение, либо NULL в случае ошибки.
	 */
	public static function getMainValue(): int|string|null;

	/**
	 * Пытается установить вариант в качестве основного в текущем перечислении,
	 * принимая в качестве параметра скалярное значение, которое должно соответствовать
	 * одному из вариантов перечисления.
	 * Вернёт предыдущий главный экземпляр типизированного перечисления, либо
	 * экземпляр варианта по умолчанию, если главный экземпляр ранее не устанавливался.
	 * В случае ошибки вернёт NULL.
	 */
	public static function setMainByValue(int|string $value): self|null;
}
