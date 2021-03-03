<?php


class Hiking
{
    private ?int $id;
    private ?string $name;
    private ?string $difficulty;
    private ?float $distance;
    private ?string $duration;
    private ?string $heightDifference;
    private ?string $available;

    /**
     * Hiking constructor.
     * @param int|null $id
     * @param string|null $name
     * @param string|null $difficulty
     * @param float|null $distance
     * @param string|null $duration
     * @param string|null $heightDifference
     * @param string|null $available
     */
    public function __construct(int $id = null, string $name = null, string $difficulty = null, float $distance = null, string $duration = null, string $heightDifference = null, string $available = null)
    {
        $this->id = $id;
        $this->name = $name;
        $this->difficulty = $difficulty;
        $this->distance = $distance;
        $this->duration = $duration;
        $this->heightDifference = $heightDifference;
        $this->available = $available;
    }

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param string|null $name
     */
    public function setName(?string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return string|null
     */
    public function getDifficulty(): ?string
    {
        return $this->difficulty;
    }

    /**
     * @param string|null $difficulty
     */
    public function setDifficulty(?string $difficulty): void
    {
        $this->difficulty = $difficulty;
    }

    /**
     * @return float|null
     */
    public function getDistance(): ?float
    {
        return $this->distance;
    }

    /**
     * @param float|null $distance
     */
    public function setDistance(?float $distance): void
    {
        $this->distance = $distance;
    }

    /**
     * @return string|null
     */
    public function getDuration(): ?string
    {
        return $this->duration;
    }

    /**
     * @param string|null $duration
     */
    public function setDuration(?string $duration): void
    {
        $this->duration = $duration;
    }

    /**
     * @return string|null
     */
    public function getHeightDifference(): ?string
    {
        return $this->heightDifference;
    }

    /**
     * @param string|null $heightDifference
     */
    public function setHeightDifference(?string $heightDifference): void
    {
        $this->heightDifference = $heightDifference;
    }

    /**
     * @return string|null
     */
    public function getAvailable(): ?string
    {
        return $this->available;
    }

    /**
     * @param string|null $available
     */
    public function setAvailable(?string $available): void
    {
        $this->available = $available;
    }
}